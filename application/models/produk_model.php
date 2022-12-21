<?php

class Produk_model extends CI_model
{
    public $limit;
    public $offset;
    public $sort;
    public $order;

    public function __contruct()
    {
        parent::__contruct();
    }

    public function get_where($key, $value)
    {
        $rs = $this->db->select('*')
                       ->from('tbl_produk')
                       ->where($key, $value)
                       ->order_by($this->sort, $this->order)
                       ->get('', $this->limit, $this->offset);

        return $rs;
    }

    public function get_for_table($aktif = null)
    {
        $sql = 'SELECT a.kode , a.nama,a.slug,b.nama as kategori, '.
                '			 a.harga,a.harga_lama,a.promo,a.gambar,a.aktif '.
                'FROM tbl_produk a '.
                'LEFT JOIN tbl_kategori b ON a.id_kategori = b.id ';

        if (isset($aktif)) {
            $sql .= 'WHERE a.aktif = ? '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .= "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql);
        }

        return $rs;
    }

    public function get($aktif = null)
    {
        $sql = 'SELECT a.*,IFNULL(FLOOR(AVG(b.rating)),0) as average_rating '.
                'FROM tbl_produk a '.
                'LEFT JOIN tbl_review b '.
                'ON a.kode = b.kode_produk ';

        if (isset($aktif)) {
            $sql .= 'WHERE a.aktif = ? ';
            $sql .=    'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .=    'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql);
        }

        return $rs;
    }

    public function get_random($slug, $aktif = null)
    {
        $sql = 'SELECT a.*,IFNULL(FLOOR(AVG(b.rating)),0) as average_rating '.
                'FROM tbl_produk a '.
                'LEFT JOIN tbl_review b '.
                'ON a.kode = b.kode_produk ';

        if (isset($aktif)) {
            $sql .= 'WHERE a.aktif = ? AND a.slug <> ? ';
            $sql .=    'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql, array($aktif, $slug));
        } else {
            $sql .= 'WHERE a.slug <> ? ';
            $sql .=    'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql, array($slug));
        }

        return $rs;
    }

    /*kurang status_stok*/
    public function get_details($slug, $aktif = null)
    {
        $sql = 'SELECT a.kode as kode_produk, a.harga_lama, a.harga,a.slug, '.
                 '		 a.promo, a.gambar, a.nama as nama_produk, a.deskripsi, '.
                 '		 b.nama as kategori,b.id as id_kategori, '.
                 '     IFNULL(e.average_rating,0) AS average_rating '.
                 'FROM tbl_produk a '.
                 'LEFT JOIN tbl_kategori b ON a.id_kategori = b.id '.
                 'LEFT JOIN ( '.
                 '			  SELECT kode_produk, FLOOR(AVG(rating)) AS average_rating '.
                 '			  FROM tbl_review '.
                 '			  GROUP BY kode_produk '.
                 '          ) e ON a.kode = e.kode_produk '.
                 "WHERE a.slug LIKE '%".$this->db->escape_like_str($slug)."' ";

        if (isset($aktif)) {
            $sql .=  'AND a.aktif = ? ';
            $sql .=  'GROUP BY a.kode';

            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .=  'GROUP BY a.kode';
            $rs = $this->db->query($sql);
        }

        return $rs;
    }

    public function get_based_on($slug, $aktif = null)
    {
        $sql = 'SELECT a.*,IFNULL(c.average_rating,0) as average_rating '.
               'FROM tbl_produk a '.
               'LEFT JOIN tbl_kategori b ON a.id_kategori = b.id '.
               'LEFT JOIN (SELECT kode_produk,FLOOR(AVG(rating)) as average_rating  '.
               '			FROM tbl_review '.
               '			GROUP BY kode_produk) c '.
               'ON a.kode = c.kode_produk '.
               "WHERE b.slug LIKE '%".$this->db->escape_like_str($slug)."' ";

        if (isset($aktif)) {
            $sql .= 'AND a.aktif = ? ';
            $sql .= 'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";

            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .= 'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";

            $rs = $this->db->query($sql);
        }

        return $rs;
    }

    public function get_based_range($min_range, $max_range, $aktif = null)
    {
        $sql = 'SELECT a.*,IFNULL(c.average_rating,0) as average_rating '.
               'FROM tbl_produk a '.
               'LEFT JOIN (SELECT kode_produk,FLOOR(AVG(rating)) as average_rating  '.
               '			FROM tbl_review '.
               '			GROUP BY kode_produk) c '.
               'ON a.kode = c.kode_produk '.
               "WHERE a.harga BETWEEN $min_range AND $max_range ";

        if (isset($aktif)) {
            $sql .= 'AND a.aktif = ? ';
            $sql .= 'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";

            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .= 'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";

            $rs = $this->db->query($sql, array());
        }

        return $rs;
    }

    public function num_page_get_based_on($slug, $aktif = null)
    {
        $sql = 'SELECT * '.
               'FROM tbl_produk a '.
               'LEFT JOIN tbl_kategori b ON a.id_kategori = b.id '.
               "WHERE b.slug LIKE '%".$this->db->escape_like_str($slug)."' ";

        if (isset($aktif)) {
            $sql .= 'AND a.aktif = ? ';
            $sql .= 'GROUP BY a.kode ';
            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .= 'GROUP BY a.kode ';
            $rs = $this->db->query($sql);
        }

        return $rs->num_rows();
    }

    public function num_page_get_range($min_range, $max_range, $aktif = null)
    {
        $sql = 'SELECT * '.
               'FROM tbl_produk a '.
               "WHERE a.harga BETWEEN $min_range AND $max_range ";

        if (isset($aktif)) {
            $sql .= 'AND a.aktif = ? ';
            $rs = $this->db->query($sql, array($aktif));
        } else {
            $rs = $this->db->query($sql, array());
        }

        return $rs->num_rows();
    }

    public function delete($kode)
    {

        //TODO delete on tbl_barang_masuk_details,tbl_produk_viewed,tbl_review,tbl_trans
        //
        //
        // $this->db->delete('tbl_produk',array('sl' => $kode));
    }

    public function insert($data)
    {
        $this->db->insert('tbl_produk', $data);
    }

    public function update($kode, $data)
    {
        $this->db->where('kode', $kode);
        $this->db->update('tbl_produk', $data);
    }

    //terbaru adalah tgl_update +- 3 bulan dari sekarang
    public function get_terbaru($aktif = null)
    {
        $sql = 'SELECT a.*,IFNULL(FLOOR(AVG(b.rating)),0) as average_rating '.
                'FROM tbl_produk a '.
                'LEFT JOIN tbl_review b '.
                'ON a.kode = b.kode_produk ';

        if (isset($aktif)) {
            $sql .= 'WHERE a.aktif = ? AND a.tgl_update BETWEEN DATE_ADD(NOW(),INTERVAL - 3 MONTH) AND NOW() ';
            $sql .=    'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .= 'WHERE a.tgl_update BETWEEN DATE_ADD(NOW(),INTERVAL - 3 MONTH) AND NOW() ';
            $sql .=    'GROUP BY a.kode '.
                    "ORDER BY $this->sort $this->order ".
                    "LIMIT $this->offset,$this->limit";
            $rs = $this->db->query($sql);
        }

        return $rs;
    }

    public function num_page_terbaru($aktif = null)
    {
        $sql = 'SELECT * '.
                'FROM tbl_produk a '.
                'LEFT JOIN tbl_review b '.
                'ON a.kode = b.kode_produk ';

        if (isset($aktif)) {
            $sql .= 'WHERE a.aktif = ? AND a.tgl_update BETWEEN DATE_ADD(NOW(),INTERVAL - 3 MONTH) AND NOW() ';
            $sql .=    'GROUP BY a.kode ';

            $rs = $this->db->query($sql, array($aktif));
        } else {
            $sql .= 'WHERE a.tgl_update BETWEEN DATE_ADD(NOW(),INTERVAL - 3 MONTH) AND NOW() ';
            $sql .=    'GROUP BY a.kode ';

            $rs = $this->db->query($sql);
        }

        return $rs->num_rows();
    }

    public function num_page($aktif = null)
    {
        $sql = 'SELECT * FROM tbl_produk ';

        if (isset($aktif)) {
            $sql .= 'WHERE aktif = ? ';
            $rs = $this->db->query($sql, array($aktif));
        } else {
            $rs = $this->db->query($sql);
        }

        return $rs->num_rows();
    }

    public function num_page_where($key, $value, $aktif = null)
    {
        $sql = 'SELECT * FROM tbl_produk WHERE ? = ? ';

        if (isset($aktif)) {
            $sql .= 'AND aktif = ? ';
            $rs = $this->db->query($sql, array($key, $value, $aktif));
        } else {
            $rs = $this->db->query($sql, array($key, $value));
        }

        return $rs->num_rows();
    }

    public function get_id($slug)
    {
        $rs = $this->db->query("SELECT kode FROM tbl_produk WHERE slug ='$slug'");

        return $rs->row()->kode;
    }
}

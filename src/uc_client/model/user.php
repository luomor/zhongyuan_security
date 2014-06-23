<?php

/*
	[UCenter] (C)2001-2009 Comsenz Inc.
	This is NOT a freeware, use is subject to license terms

	$Id: user.php,v 1.1 2009/08/11 03:21:25 blt Exp $
*/

!defined('IN_UC') && exit('Access Denied');

class usermodel {

	var $db;
	var $base;

    var $db_bbs;
    var $db_sns;

	function __construct(&$base) {
		$this->usermodel($base);
	}

	function usermodel(&$base) {
		$this->base = $base;
		$this->db = $base->db;
        $this->db_bbs = $base->db_bbs;
        $this->db_sns = $base->db_sns;
	}

	function get_user_by_uid($uid) {
		$arr = $this->db->fetch_first("SELECT * FROM ".UC_DBTABLEPRE."members WHERE uid='$uid'");
		return $arr;
	}

	function get_user_by_username($username) {
		$arr = $this->db->fetch_first("SELECT * FROM ".UC_DBTABLEPRE."members WHERE username='$username'");
		return $arr;
	}

	function check_username($username) {
		$guestexp = '\xA1\xA1|\xAC\xA3|^Guest|^\xD3\xCE\xBF\xCD|\xB9\x43\xAB\xC8';
		$len = strlen($username);
		if($len > 15 || $len < 3 || preg_match("/\s+|^c:\\con\\con|[%,\*\"\s\<\>\&]|$guestexp/is", $username)) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function check_mergeuser($username) {
		$data = $this->db->result_first("SELECT count(*) FROM ".UC_DBTABLEPRE."mergemembers WHERE appid='".$this->base->app['appid']."' AND username='$username'");
		return $data;
	}

	function check_usernamecensor($username) {
		$_CACHE['badwords'] = $this->base->cache('badwords');
		$censorusername = $this->base->get_setting('censorusername');
		$censorusername = $censorusername['censorusername'];
		$censorexp = '/^('.str_replace(array('\\*', "\r\n", ' '), array('.*', '|', ''), preg_quote(($censorusername = trim($censorusername)), '/')).')$/i';
		$usernamereplaced = isset($_CACHE['badwords']['findpattern']) && !empty($_CACHE['badwords']['findpattern']) ? @preg_replace($_CACHE['badwords']['findpattern'], $_CACHE['badwords']['replace'], $username) : $username;
		if(($usernamereplaced != $username) || ($censorusername && preg_match($censorexp, $username))) {
			return FALSE;
		} else {
			return TRUE;
		}
	}

	function check_usernameexists($username) {
		$data = $this->db->result_first("SELECT username FROM ".UC_DBTABLEPRE."members WHERE username='$username'");
		return $data;
	}

	function check_emailformat($email) {
		return strlen($email) > 6 && preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $email);
	}

	function check_emailaccess($email) {
		$setting = $this->base->get_setting(array('accessemail', 'censoremail'));
		$accessemail = $setting['accessemail'];
		$censoremail = $setting['censoremail'];
		$accessexp = '/('.str_replace("\r\n", '|', preg_quote(trim($accessemail), '/')).')$/i';
		$censorexp = '/('.str_replace("\r\n", '|', preg_quote(trim($censoremail), '/')).')$/i';
		if($accessemail || $censoremail) {
			if(($accessemail && !preg_match($accessexp, $email)) || ($censoremail && preg_match($censorexp, $email))) {
				return FALSE;
			} else {
				return TRUE;
			}
		} else {
			return TRUE;
		}
	}

	function check_emailexists($email, $username = '') {
		$sqladd = $username !== '' ? "AND username<>'$username'" : '';
		$email = $this->db->result_first("SELECT email FROM  ".UC_DBTABLEPRE."members WHERE email='$email' $sqladd");
		return $email;
	}

	function check_login($username, $password, &$user) {
		$user = $this->get_user_by_username($username);
		if(empty($user['username'])) {
			return -1;
		} elseif($user['password'] != md5(md5($password).$user['salt'])) {
			return -2;
		}
		return $user['uid'];
	}

	function add_user($username, $password, $email, $uid = 0, $questionid = '', $answer = '') {
		$salt = substr(uniqid(rand()), -6);
		$password = md5(md5($password).$salt);
		$sqladd = $uid ? "uid='".intval($uid)."'," : '';
		$sqladd .= $questionid > 0 ? " secques='".$this->quescrypt($questionid, $answer)."'," : " secques='',";
		$this->db->query("INSERT INTO ".UC_DBTABLEPRE."members SET $sqladd username='$username', password='$password', email='$email', regip='".$this->base->onlineip."', regdate='".$this->base->time."', salt='$salt'");
		$uid = $this->db->insert_id();
		$this->db->query("INSERT INTO ".UC_DBTABLEPRE."memberfields SET uid='$uid'");

        //bbs
        $this->insertbbs($username, $password, $email, $uid, '', '');

        //sns
        $this->insertsns($username, $password, $email, $uid, '', '');
		return $uid;
	}

    function insertbbs($username, $password, $email, $uid = 0, $questionid = '', $answer = '') {
        $groupid = 10;
        $extdata['credits'] = explode(',', "2");
        $extdata['emailstatus'] = 0;
        //C::t('common_member')->insert($uid, $username, md5(random(10)), $email, $this->base->onlineip, $groupid, $init_arr);

        $credits = isset($extdata['credits']) ? $extdata['credits'] : array();
        $profile = isset($extdata['profile']) ? $extdata['profile'] : array();
        $profile['uid'] = $uid;
        $base = array(
            'uid' => $uid,
            'username' => (string)$username,
            'password' => (string)$password,
            'email' => (string)$email,
            'adminid' => 0,
            'groupid' => intval($groupid),
            'regdate' => TIMESTAMP,
            'emailstatus' => intval($extdata['emailstatus']),
            'credits' => dintval($credits[0]),
            'timeoffset' => 9999
        );
        $status = array(
            'uid' => $uid,
            'regip' => (string)$this->base->onlineip,
            'lastip' => (string)$this->base->onlineip,
            'lastvisit' => TIMESTAMP,
            'lastactivity' => TIMESTAMP,
            'lastpost' => 0,
            'lastsendmail' => 0
        );
        $count = array(
            'uid' => $uid,
            'extcredits1' => dintval($credits[1]),
            'extcredits2' => dintval($credits[2]),
            'extcredits3' => dintval($credits[3]),
            'extcredits4' => dintval($credits[4]),
            'extcredits5' => dintval($credits[5]),
            'extcredits6' => dintval($credits[6]),
            'extcredits7' => dintval($credits[7]),
            'extcredits8' => dintval($credits[8])
        );
        $ext = array('uid' => $uid);
        $this->insert("common_member", $base, false, true);

        $this->insert("common_member_status", $status, false, true);
        $this->insert("common_member_count", $count, false, true);
        $this->insert("common_member_profile", $profile, false, true);
        $this->insert("common_member_field_forum", $ext, false, true);
        $this->insert("common_member_field_home", $ext, false, true);

        $data = array(
            'uid' => $uid,
            'action' => "add",
            'dateline' => time()
        );
        $this->insert("common_member_log", $data, false, true);
    }

    public function insert($table, $data, $return_insert_id = false, $replace = false, $silent = false) {
        $sql = self::implode($data);

        $cmd = $replace ? 'REPLACE INTO' : 'INSERT INTO';

        $table = $this->table($table);
        $silent = $silent ? 'SILENT' : '';

        $this->db_bbs->query("$cmd $table SET $sql");

        if($return_insert_id) {
            return $this->db_bbs->insert_id();
        }
    }

    public static function implode($array, $glue = ',') {
        $sql = $comma = '';
        $glue = ' ' . trim($glue) . ' ';
        foreach ($array as $k => $v) {
            $sql .= $comma . self::quote_field($k) . '=' . self::quote($v);
            $comma = $glue;
        }
        return $sql;
    }

    public static function quote_field($field) {
        if (is_array($field)) {
            foreach ($field as $k => $v) {
                $field[$k] = self::quote_field($v);
            }
        } else {
            if (strpos($field, '`') !== false)
                $field = str_replace('`', '', $field);
            $field = '`' . $field . '`';
        }
        return $field;
    }

    public static function quote($str, $noarray = false) {

        if (is_string($str))
            return '\'' . addcslashes($str, "\n\r\\'\"\032") . '\'';

        if (is_int($str) or is_float($str))
            return '\'' . $str . '\'';

        if (is_array($str)) {
            if($noarray === false) {
                foreach ($str as &$v) {
                    $v = self::quote($v, true);
                }
                return $str;
            } else {
                return '\'\'';
            }
        }

        if (is_bool($str))
            return $str ? '1' : '0';

        return '\'\'';
    }

    public function table($table) {
        return $this->db_bbs->tablepre . $table;
    }

    public function tname($table) {
        return $this->db_sns->tablepre . $table;
    }

    function insertsns($username, $password, $email, $uid = 0, $questionid = '', $answer = '') {
        $setarr = array(
            'uid' => $uid,
            'username' => addslashes($username),
            'password' => md5("$uid")
        );
        $this->inserttable('member', $setarr, 0, true);

        $space = array(
            'uid' => $uid,
            'username' => $username,
            'dateline' => time(),
            'groupid' => 0,
            'regip' => $this->base->onlineip
        );

        $reward = array(
            'credit' => 25,
            'experience' => 15
        );
        if($reward['credit']) {
            $space['credit'] = $reward['credit'];
        }
        if($reward['experience']) {
            $space['experience'] = $reward['experience'];
        }
        $this->inserttable('space', $space, 0, true);
        $this->inserttable('spacefield', array('uid'=>$uid, 'email'=>$email), 0, true);
    }

    function inserttable($tablename, $insertsqlarr, $returnid=0, $replace = false, $silent=0) {
        $insertkeysql = $insertvaluesql = $comma = '';
        foreach ($insertsqlarr as $insert_key => $insert_value) {
            $insertkeysql .= $comma.'`'.$insert_key.'`';
            $insertvaluesql .= $comma.'\''.$insert_value.'\'';
            $comma = ', ';
        }
        $method = $replace?'REPLACE':'INSERT';
        $this->db_sns->query($method.' INTO '.$this->tname($tablename).' ('.$insertkeysql.') VALUES ('.$insertvaluesql.')');
        if($returnid && !$replace) {
            return $this->db_sns->insert_id();
        }
    }

	function edit_user($username, $oldpw, $newpw, $email, $ignoreoldpw = 0, $questionid = '', $answer = '') {
		$data = $this->db->fetch_first("SELECT username, uid, password, salt FROM ".UC_DBTABLEPRE."members WHERE username='$username'");

		if($ignoreoldpw) {
			$isprotected = $this->db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE."protectedmembers WHERE uid = '$data[uid]'");
			if($isprotected) {
				return -8;
			}
		}

		if(!$ignoreoldpw && $data['password'] != md5(md5($oldpw).$data['salt'])) {
			return -1;
		}

		$sqladd = $newpw ? "password='".md5(md5($newpw).$data['salt'])."'" : '';
		$sqladd .= $email ? ($sqladd ? ',' : '')." email='$email'" : '';
		if($questionid !== '') {
			if($questionid > 0) {
				$sqladd .= ($sqladd ? ',' : '')." secques='".$this->quescrypt($questionid, $answer)."'";
			} else {
				$sqladd .= ($sqladd ? ',' : '')." secques=''";
			}
		}
		if($sqladd || $emailadd) {
			$this->db->query("UPDATE ".UC_DBTABLEPRE."members SET $sqladd WHERE username='$username'");
			return $this->db->affected_rows();
		} else {
			return -7;
		}
	}

	function delete_user($uidsarr) {
		$uidsarr = (array)$uidsarr;
		$uids = $this->base->implode($uidsarr);
		$arr = $this->db->fetch_all("SELECT uid FROM ".UC_DBTABLEPRE."protectedmembers WHERE uid IN ($uids)");
		$puids = array();
		foreach((array)$arr as $member) {
			$puids[] = $member['uid'];
		}
		$uids = $this->base->implode(array_diff($uidsarr, $puids));
		if($uids) {
			$this->db->query("DELETE FROM ".UC_DBTABLEPRE."members WHERE uid IN($uids)");
			$this->db->query("DELETE FROM ".UC_DBTABLEPRE."memberfields WHERE uid IN($uids)");
			uc_user_deleteavatar($uidsarr);
			$this->base->load('note');
			$_ENV['note']->add('deleteuser', "ids=$uids");
			return $this->db->affected_rows();
		} else {
			return 0;
		}
	}

	function get_total_num($sqladd = '') {
		$data = $this->db->result_first("SELECT COUNT(*) FROM ".UC_DBTABLEPRE."members $sqladd");
		return $data;
	}

	function get_list($page, $ppp, $totalnum, $sqladd) {
		$start = $this->base->page_get_start($page, $ppp, $totalnum);
		$data = $this->db->fetch_all("SELECT * FROM ".UC_DBTABLEPRE."members $sqladd LIMIT $start, $ppp");
		return $data;
	}

	function name2id($usernamesarr) {
		$usernamesarr = uc_addslashes($usernamesarr, 1, TRUE);
		$usernames = $this->base->implode($usernamesarr);
		$query = $this->db->query("SELECT uid FROM ".UC_DBTABLEPRE."members WHERE username IN($usernames)");
		$arr = array();
		while($user = $this->db->fetch_array($query)) {
			$arr[] = $user['uid'];
		}
		return $arr;
	}

	function quescrypt($questionid, $answer) {
		return $questionid > 0 && $answer != '' ? substr(md5($answer.md5($questionid)), 16, 8) : '';
	}

}

?>
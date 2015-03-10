<?php

	class Clear_exist_test_user
	{
		public static function delete($uid)
		{
			$sql = 'select uid from users where reg_time < 1423837616 and uid ='.($uid);
			// echo $sql;
			$user = Table::selectBySql($sql);
			if(empty($user))
			{
				echo "no user\n";
				return;
			}
			// 
			Table::clear_cache($uid);
			// 
			$table_model = array('activity_continuous_payment','activity_level','activity_payment_award','activity_turn_table','arena','cash_logs','oper_uid'=>'cdkeys','chenghao','equips','guide','items','item_logs','map','message','player_gift','roles','shenqi','shop','smelt','s_uid'=>'sociaty','sociaty_member','team','user_server','users');
			foreach ($table_model as $key => $value) {
				//
				if(is_numeric($key))
				{
					$sql = 'delete from '.$value.' where uid='.$uid.';';
				}else{
					$sql = 'delete from '.$value.' where '.$key.'='.$uid.';';
				}
				echo $sql,"\n";

				Table::deleteBySQL($sql);
			}
			echo 'delete cache',"\n";
			self::clear_cache($uid);
		}

		private static $USE_CACHE_TABLES = array('users', 'equips', 'items', 'map', 'roles', 'shenqi', 'smelt');#
		/**
		 * 删除某一用户的缓存数据
		 * @param unknown_type $uid
		 */
		public static function clear_cache($uid) {
			// echo 
			foreach (self::$USE_CACHE_TABLES as $id) {

				if(Cache::getCache()->delete($id . "_" . $uid))
				{
					echo 'key:',$id,"_" ,$uid,"\n";
				}
			}
		}
		public static function run()
		{
			$table_model = array('activity_continuous_payment','activity_level','activity_payment_award','activity_turn_table','arena','cash_logs','oper_uid'=>'cdkeys','chenghao','equips','guide','items','item_logs','map','message','player_gift','roles','shenqi','shop','smelt','s_uid'=>'sociaty','sociaty_member','team','user_server','users');
			foreach ($table_model as $key => $value) {
				# code...
				$sql_select = 'select count(*) from '.$value;
				$flag[$value] = Table::selectBySql($sql);
			}
			echo json_encode($flag);

			$sql =  'select uid from users where reg_time< 1423837616;';
			$uids = Table::selectBySql($sql);
			var_dump($uids);
			foreach ($uids as $key => $date) {
				self::delete($date['uid']);
			}
			echo 'delete user num'.count($uids);
			foreach ($table_model as $key => $value) {
				# code...
				$sql_select = 'select count(*) from '.$value;
				$flag[$value] = Table::selectBySql($sql);
			}
			echo json_encode($flag);
		}
		
	}
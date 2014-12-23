<?php
/**
 * @author company Sevenga
 * @author Zhen Yang <yz0437@gmail.com>
 * @copyright 2014
 * @Additional instructions  提取module act作为生成测试脚本
 */
/**
 * 活动
 * @author 
 *
 */
class ModActivityCollection {
	
	/**
	 * 获取数据
	 * @param unknown_type $uid
	 * @param unknown_type $json
	 * @param unknown_type $user
	 */
	public function get_data($uid, $json, $user) {
		$ret = array();
		list($switch, $config_id, $open_at, $close_at) = ActivityCollection::get_activity_setting();
		if ($switch) {
			$coll = ActivityCollection::selectActivityCollection($config_id);
			$player_coll = ActivityPlayerCollection::selectByUid($uid);
			
			$ret['config_id'] = $config_id;
			$ret['open_at'] = $open_at;
			$ret['close_at'] = $close_at;
			$ret['all_collect'] = $coll->sum_devote;
			$ret['stage'] = $coll->stage;
			$ret['my_collect'] = $player_coll->devote_value;
		}
		Output::ok(array(1, $ret));
	}
	
	/**
	 * 物资贡献
	 * @param unknown_type $uid
	 * @param unknown_type $json
	 * @param unknown_type $user
	 */
	public function contribute($uid, $json, $user) {
		$item_id = $json['item_id'];
		$item_num = $json['item_num'];
		if (empty($item_id) || empty($item_num)) {
			Output::ok(array(0, Lang::$ERROR_PARAMETERS));
		}
		list($switch, $config_id, $open_at, $close_at) = ActivityCollection::get_activity_setting();
		if (!$switch) {
			Output::ok(array(0, Lang::$ACTIVITY_MESSAGE1));
		}
		$item_config = getJsonConfig()->getConfig('collection')->get_item_config($config_id);
		if (empty($item_config)) {
			logs("activity_error===");
			error_log("activity_error===");
			Output::ok(array(0, Lang::$ACTIVITY_MESSAGE2));
		}
		
		if (empty($item_config[$item_id])) {
			Output::ok(array(0, Lang::$ACTIVITY_MESSAGE3));
		}
		
		$devote_config = $item_config[$item_id]['devote'];
		$sum_devote = $devote_config * $item_num;
		
		Table::START_TRANSACTION();
		$coll = ActivityCollection::selectActivityCollection($config_id, true);
		$player_coll = ActivityPlayerCollection::selectByUid($uid);
		if ($player_coll->current_stage != $coll->stage) {
			$player_coll->current_stage = $coll->stage;
		}
		
		$box = array();
		$result = Item::useItem($uid, $item_id, $item_num);
		Item::addItem($uid, $item_config[$item_id]['chest'], $item_num, "activity_collection");
		array_push($box, array($item_config[$item_id]['chest'], $item_num));
		if (!$result) {
			Table::ROLLBACK();
			Output::ok(array(0, Lang::$ITEM_NUM_NOT_ENOUGH));
		}
		$coll->sum_devote += $sum_devote;
		$player_coll->devote_value[$coll->stage - 1] += $sum_devote;
		$player_coll->sum_devote_value += $sum_devote;
		
		list($phase, $standard, $award_list, $sum_stage) = getJsonConfig()->getConfig('collection')->get_stage_config($config_id, $coll->stage);
		if (empty($phase)) {
			Table::ROLLBACK();
			Output::ok(array(0, Lang::$ERROR_CONFIG));
		}
		#检测是否达到发放奖励的条件
		if ($player_coll->devote_value[$coll->stage - 1] >= $standard) {
			if ($player_coll->award_stage < $coll->stage) {
				$player_coll->award_stage = $coll->stage;
				$mcontent = "恭喜您获得奖励";
				Message::addMessage($uid, MessageType::$COMMON, Lang::$EMAIL_ACTIVITY_MESSAGE2, 0, 0, $award_list);
			}
		}
		
		#达成了一个阶段
		if ($coll->sum_devote >= $phase) {
			$coll->sum_devote = 0;
			$coll->stage += 1;
			$player_coll->current_stage = $coll->stage;
				
			#所有的目标达成，发放排行榜奖励
			if ($coll->stage > $sum_stage) {
				logs("send_award_rank=============>>>");
				ActivityPlayerCollection::send_award_rank();
			}
		}
		
		$player_coll->update();
		$coll->update();
		Table::COMMIT();
		
		Output::ok(array(1, array('box'=>$box)));
	}
	
	/**
	 * 获取到排行榜
	 * @param unknown_type $uid
	 * @param unknown_type $json
	 */
	public function get_rank($uid, $json) {
		$rank = array();
		$sql = "select a.name, b.sum_devote_value from users as a, activity_player_collection as b where a.uid = b.uid and b.sum_devote_value > 0 order by b.sum_devote_value desc limit 50";
		$data = Table::selectBySql($sql);
		foreach ($data as $item) {
			array_push($rank, array('name'=>$item['name'], 'devote_value'=>$item['sum_devote_value']));
		}
		Output::ok(array(1, $rank));
	}
}


// $nn = new ModActivityCollection();
// print_r( get_declared_classes());
print_r(get_class_methods(ModActivityCollection));

$a = get_declared_classes();

foreach($a as $v)
{
	$t = new ReflectionClass($v);
	// echo $v," ".($t->isUserDefined()?'true':'false'),"\n";
	if($t->isUserDefined())
	{
		$reflection_methods = $t->getMethods();
		foreach ($reflection_methods as  $reflection_method) 
		{	
			// var_dump($reflection_method);
			var_dump($reflection_method->getParameters());
		}
	}

}

class Log{
	function write($mod,$act)
	{
		$a = fopen('./api/'.$mod,'a+')
	}
}

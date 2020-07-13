<?php
/**
 * @brief 升级更新控制器
 */
class Update extends IController
{
	/**
	 * @brief 升级更新
	 */
	public function index()
	{
		set_time_limit(0);

		$sql = array(
            "DROP TABLE IF EXISTS `{pre}topic`;",
            "CREATE TABLE `{pre}topic` (
              `id` int(11) unsigned NOT NULL auto_increment,
              `name` varchar(50) NOT NULL COMMENT '专题名称',
              `content` mediumtext COMMENT '页面内容',
              `update_time` datetime NOT NULL COMMENT '更新时间',
              PRIMARY KEY  (`id`)
            ) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='专题页面';",

            "ALTER TABLE `{pre}category` ADD `img` varchar(255) default NULL COMMENT '分类图片';",

            "ALTER TABLE `{pre}spec` ADD `sort` SMALLINT(5) NOT NULL DEFAULT '99' COMMENT '排序';",
            "ALTER TABLE `{pre}spec` DROP `type`;",

            "INSERT INTO `{pre}right` VALUES (NULL, '[营销]专题列表', 'market@topic_list', 0);",
            "INSERT INTO `{pre}right` VALUES (NULL, '[营销]专题添加修改', 'market@topic_edit,market@topic_edit_act', 0);",
            "INSERT INTO `{pre}right` VALUES (NULL, '[营销]专题删除', 'market@topic_del', 0);",
            "INSERT INTO `{pre}right` VALUES (NULL, '[系统]第三方平台', 'system@oauth_list,system@oauth_edit,system@oauth_edit_act,system@hsms,system@test_sendhsms', 0);",
		);

		foreach($sql as $key => $val)
		{
		    IDBFactory::getDB()->query( $this->_c($val) );
		}

		//更新goods和products里面的spec_array字段数据
		$goodsDB  = new IModel('goods');
		$goodsData= $goodsDB->query(' spec_array is not null or spec_array != "" ','spec_array,id','',50000);
		foreach($goodsData as $key => $val)
		{
		    if($val['spec_array'])
		    {
		        $updateData = JSON::decode($val['spec_array']);
		        foreach($updateData as $k => $v)
		        {
		            unset($updateData[$k]['type']);

		            foreach($updateData[$k]['value'] as $i => $j)
		            {
		                $tempStr = current($j);

		                //不是图片
		                if($tempStr && stripos($tempStr,'/') === false)
		                {
		                    $updateData[$k]['value'][$i] = [$tempStr => ""];
		                }
		            }
		        }
		        $goodsDB->setData(['spec_array' => IFilter::act(JSON::encode($updateData))]);
		        $goodsDB->update($val['id']);
		    }
		}

        $productDB= new IModel('products');
        $productData= $productDB->query(' spec_array is not null or spec_array != "" ','spec_array,id','',50000);
        foreach($productData as $key => $val)
        {
		    if($val['spec_array'] && stripos($val['spec_array'],'tip') !== false)
		    {
		        $updateData = JSON::decode($val['spec_array']);
		        foreach($updateData as $k => $v)
		        {
		            if(stripos($updateData[$k]['value'],"/") === false)
		            {
		                $image = "";
		            }
		            else
		            {
		                $image = $updateData[$k]['value'];
		                $updateData[$k]['value'] = $updateData[$k]['tip'];
		            }

                    unset($updateData[$k]['type']);
                    unset($updateData[$k]['tip']);

                    $updateData[$k]['image'] = $image;
		        }

		        $productDB->setData(['spec_array' => IFilter::act(JSON::encode($updateData))]);
		        $productDB->update($val['id']);
		    }
        }

        //清空runtime缓存
		$runtimePath = IWeb::$app->getBasePath().'runtime';
		$result      = IFile::clearDir($runtimePath);
		die("升级成功!! V5.7版本");
	}

	public function _c($sql)
	{
		return str_replace('{pre}',IWeb::$app->config['DB']['tablePre'],$sql);
	}
}
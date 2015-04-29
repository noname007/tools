<?php
    /**
     * @author company Sevenga
     * @author Zhen Yang <yz0437@gmail.com>
     * @copyright  2015
     * @Additional instructions 拷贝文件--http://coolshell.cn/articles/10652.html 元驱动编程
     */
    /*
     *type
     *position
     */
    // $rules = array('');
    // c
    // 
    function travel($file_relative_pos = '')
        {
            $opendirfail = 1;
            if($handle=opendir($this->dir_absolute_pos.$file_relative_pos))
            {

                while(($dir_file = readdir($handle))!== false)
                {
                    if($dir_file =='.' || $dir_file == '..' || $dir_file == '.git')
                    {
                        continue;
                    }
            
                    $temp = $file_relative_pos.'/'.$dir_file;
                    if(is_dir($this->dir_absolute_pos.'/'.$temp))
                    {
                        $this->travel($temp);
                    }
                    else
                        $this->gen_file_md5($temp);
                }
            }
            else
            {
                return array('sucess'=>0,'res'=>'read dir info fail!');
            }   
        }
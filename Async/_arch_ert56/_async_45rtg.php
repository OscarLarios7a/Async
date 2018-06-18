<?php
	
    /**
	 * ------------------------------------------
	 *				_MESSAGE
	 * ------------------------------------------
     * @param strign $message
     * @param strign $type
	 */
	function _MESSEGE($message='', $type='', $structure='', $db=''){
		echo '<style type="text/css">
            ._mg_34fgt{
                font-family: arial;
                position: fixed;
                background: rgba(0,0,0,0.5);
                left: 0;
                right: 0;
                bottom: 0;
                top: 0;
                z-index: 20000;
            }
            ._cd_hj789{
                border: 1px solid #555;
                border-radius: 5px;
                background: #FFFFFF;
                margin: auto;
                margin-top: 5%;                
                overflow: hidden;
                width: 30%;
            }
            ._cd_hj789 > ._hd_78ujk{
                background: linear-gradient(141deg, #ff6699, #512e67);
                color: #FFFFFF;
                padding: 20px;
                text-align: center;            
            }
            ._cd_hj789 > ._by_drf45{
                padding: 20px;
                text-align: center;
                font-size: 18px;
                margin-top: 25px;
                margin-bottom: 25px;
            }
            ._cd_hj789 > ._by_drf45 > span{
                display: block;
                font-size: 14px;
                color: #555;
                margin-top:20px;
            }
            ._cd_hj789 > ._fo_fgt67{
                padding: 5px;
                font-size:10px;
                color: #555;
            }
        </style>    
        <div class="_mg_34fgt">
            <div class="_cd_hj789">
                <div class="_hd_78ujk">                    
                    <span>Async <i>Data Base</i> - '.$db.'</span>
                </div>
                <div class="_by_drf45">
                    '.$message.'
                    <span>'.$structure.'<span>
                </div>
                <div class="_fo_fgt67">
                    &copy; 2018 Async - error code: '.$type.'
                </div>
            </div>
        </div>		';
	}


    /**
     * ------------------------------------------
     *              _STRUCTURE
     * ------------------------------------------
     * @param strign $msg
     * @param strign $db
     * @param strign $url
     * @param strign $user
     */
    function _STRUCTURE($msg='', $db='', $url='', $user=''){
        echo '<style type="text/css">
            ._mg_34fgt{
                font-family: arial;
                position: fixed;
                background: rgba(0,0,0,0.5);
                left: 0;
                right: 0;
                bottom: 0;
                top: 0;
                z-index: 20000;
            }
            ._cd_hj789{
                border: 1px solid #555;
                border-radius: 5px;
                background: #FFFFFF;
                margin: auto;
                margin-top: 5%;                
                overflow: hidden;
                width: 30%;
            }
            ._cd_hj789 > ._hd_78ujk{
                background: linear-gradient(141deg, #ff6699, #512e67);
                color: #FFFFFF;
                padding: 20px;
                text-align: center;            
            }
            ._cd_hj789 > ._by_drf45{
                padding: 20px;
                text-align: center;
                font-size: 18px;
                margin-top: 25px;
                margin-bottom: 25px;
            }
            ._cd_hj789 > ._by_drf45 > span{
                display: block;
                font-size: 14px;
                color: #555;
                margin-top:20px;
            }
            ._cd_hj789 > ._fo_fgt67{
                padding: 5px;
                font-size:10px;
                color: #555;
            }
        </style>    
        <div class="_mg_34fgt">
            <div class="_cd_hj789">
                <div class="_hd_78ujk">                    
                    <span>Async <i>Data Base</i> - '.$db.'</span>
                </div>
                <div class="_by_drf45">
                    '.$msg.'
                    <span><i>'.$db.'</i>,<span>
                    <span><i>'.$url.'</i>,<span>
                    <span><i>'.$user.'</i><span><br><br>
                    <span>obtenido de <i>install.php</i></span>
                </div>
                <div class="_fo_fgt67">
                    &copy; 2018 Async
                </div>
            </div>
        </div>      ';
    }
?>
<?php
header("Pragma:no-cache");
header("Cache-Control:no-cache,must-revalidate");
include '../src/method_config.php';
session_chk();
$sql = "select *, o.m_no mno from order_info o 
left join member m on m.m_no = o.m_no 
left join member_child mc on mc.mc_no = o.mc_no
where o_no = '{$_GET[o_no]}' order by o_order_date asc";
$r = sqlresult($sql)[0];
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
	<meta name="robots" content="index, follow" />
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    <script src="./js/jquery.min.js"></script>
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?2747">
	<link rel="stylesheet" type="text/css" href="style.css?4549">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>admin-list-1</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="/src/datetimepicker.css">
    <script src=/src/datetimepicker.js></script>
    <script src="js/phone_validation.js"></script>
    <style>
        .temp{
            width:100%;
            height:10rem;
            overflow-wrap: break-word;
        }
        .info{
            height:10rem;
            text-align:start;
            resize:none;
        }
    </style>
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->


<!-- Main container -->
<div class="page-container">
    
<!-- bloc-2 -->
<div class="bloc l-bloc" id="bloc-2">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-4 col-lg-3">
				<h4 class="mg-md">
					????????????<br>????????? ?????????
				</h4>
			</div>
			<div class="col-sm-8 col-lg-9 k-align-right">
                <a href="admin-list" class="btn btn-lg btn-style width100 btn-cadmium-orange">????????????<br></a><a href="admin-register" class="btn btn-d btn-lg btn-style float-lg-none width100">????????????</a><a href="admin-assign" class="btn btn-d btn-lg btn-style float-lg-none width100">????????????<br></a><a href="admin-manager" class="btn btn-d btn-lg btn-style float-lg-none width100">?????????<br></a><a href="admin-service" class="btn btn-d btn-lg btn-style float-lg-none width100">?????????<br></a><a href="admin-order" class="btn btn-d btn-lg btn-style float-lg-none width100">????????????<br></a><a href="admin-passwd" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=800'); return false;" class="btn btn-d btn-lg btn-style float-lg-none width100">????????????<br></a><a href="logout" class="btn btn-d btn-lg btn-style float-lg-none width100">????????????<br></a>
            </div>
		</div>
	</div>
</div>
<!-- bloc-2 END -->

<!-- bloc-23 -->
<div class="bloc l-bloc" id="bloc-23">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12">
				<h4 class="mg-md ">
					?????? ?????? ?????? - <?=$r[m_name]?>??? (???????????? : <?=$r[o_no]?>)
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-23 END -->

<!-- bloc-24 -->
    <form method="POST" action="process/admin">
        <input type="hidden" name="o_no" value="<?=$r[o_no]?>">
        <input type="hidden" name="m_no" value="<?=$r[mno]?>">
        <input type="hidden" name="mc_no" value="<?=$r[mc_no]?>">
        <input type="hidden" name="method" value="list">
<div class="bloc l-bloc" id="bloc-24">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-md-6">
				<div class="form-group mb-3">
					<label class="form-label">
						?????????<br>
					</label>
					<input class="form-control" id="datetimepicker" name="o_order_date" value="<?=$r[o_order_date]?>"/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						??????<br>
					</label>
					<input class="form-control" value="<?=$r[m_name]?>" readonly/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						??????<br>
					</label>
					<input class="form-control" value="<?=$r[m_addr]?>" readonly/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label label-bloc-24-style">
						???????????????<br>
					</label>
                    <select class="form-control" name="o_service_detail">
                        <?php
                        if($r[o_service]=="?????? ??????"){
                            ?>
                        <option value="??????" <?=($r[o_service_detail]=="??????")?"selected":""?>>?????? ??????</option>
                        <option value="?????????" <?=($r[o_service_detail]=="?????????")?"selected":""?>>????????? ??????</option>
                        <?php
                        }else{
                            ?>
                                <option value="?????????" <?=($r[o_service_detail]=="?????????")?"selected":""?>>?????????</option>
                                <option value="??????" <?=($r[o_service_detail]=="??????")?"selected":""?>>??????</option>
                                <option value="??????" <?=($r[o_service_detail]=="??????")?"selected":""?>>??????</option>
                                <option value="??????" <?=($r[o_service_detail]=="??????")?"selected":""?>>??????</option>
                            </select>
                        <?php
                        }
                        ?>

                    </select>
				</div>
				<div class="form-group mb-3">
					<label class="form-label label-bloc-24-style">
						????????????<br>
					</label>
                    <select class="form-control" name="o_pay">
                        <option value="???" <?=($r[o_pay]=="???")?"selected":""?>>???</option>
                        <option value="?????????" <?=($r[o_pay]=="?????????")?"selected":""?>>?????????</option>
                    </select>
                    <?php
                    if($r[o_service]=="?????? ??????"){
                        ?>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????? ??????<br>
                        </label>
                        <input class="form-control" value="<?=$r[mc_name]?>" readonly/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ???????????? ?????????<br>
                        </label>
                        <input class="form-control" autocomplete="off" id="child_start_datepicker" name="o_start_time" value="<?=date("Y-m-d",strtotime($r[o_start_time]))?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????????
                        </label>
                        <select class="form-control-mcc" name="o_d1">
                            <option value="Y" <?=($r[o_d1]=="Y")?"selected":""?>>??????</option>
                            <option value="N" <?=($r[o_d1]=="N")?"selected":""?>>??????</option>
                        </select>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d1_start" name="o_d1_start" value="<?=($r[o_d1_start] != "")?$r[o_d1_start]:""?>"/>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d1_end"  name="o_d1_end" value="<?=($r[o_d1_end] != "")?$r[o_d1_end]:""?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????????
                        </label>
                        <select class="form-control-mcc" name="o_d3">
                            <option value="Y" <?=($r[o_d3]=="Y")?"selected":""?>>??????</option>
                            <option value="N" <?=($r[o_d3]=="N")?"selected":""?>>??????</option>
                        </select>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d3_start" name="o_d3_start" value="<?=($r[o_d3_start] != "")?$r[o_d3_start]:""?>"/>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d3_end"   name="o_d3_end" value="<?=($r[o_d3_end] != "")?$r[o_d3_end]:""?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????????
                        </label>
                        <select class="form-control-mcc" name="o_d5">
                            <option value="Y" <?=($r[o_d5]=="Y")?"selected":""?>>??????</option>
                            <option value="N" <?=($r[o_d5]=="N")?"selected":""?>>??????</option>
                        </select>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d5_start" name="o_d5_start" value="<?=($r[o_d5_start] != "")?$r[o_d5_start]:""?>"/>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d5_end"   name="o_d5_end" value="<?=($r[o_d5_end] != "")?$r[o_d5_end]:""?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????? ?????? ??????<br>
                        </label>
                        <textarea class="form-control info"  readonly>
?????? : <?=$r[o_relation]?> 
?????? : <?=$r[o_health]?> <?=$r[o_health_etc_comment]?> 
???????????? : <?=$r[o_condition]?> <?=$r[o_condition_etc_comment]?> 
???????????? : <?=$r[o_back_home]?> <?=$r[o_back_home_etc_comment]?> 
???????????? : <?=$r[o_emergency]?>
                        </textarea>    
                    </div>
                        <?php
                    }
                    ?>
                    <input type="submit" class="btn btn-d btn-lg w-100 k-m-u-30" name="req" value="??????">
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group mb-3">
					<label class="form-label">
						?????????
					</label>
					<input class="form-control" value="<?=$r[o_regat]?>" readonly/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label label-bloc-24-style">
						????????????<br>
					</label>
					<input type="tel" class="form-control phone" name="m_tel" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13" value="<?=$r[m_tel]?>"/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						?????????<br>
					</label>
                    <select class="form-control" name="o_service" readonly>
                        <option value="?????? ??????" <?=($r[o_service]=="?????? ??????")?"selected":""?>>?????? ??????</option>
                        <option value="?????? ??????" <?=($r[o_service]=="?????? ??????")?"selected":""?>>?????? ??????</option>
                    </select>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						??????<br>
					</label>
					<input class="form-control" name="o_cmt" value="<?=$r[o_cmt]?>"/>
				</div>
				<div class="form-group mb-3">
					<label class="form-label">
						???????????????<br>
					</label>
                    <select class="form-control" name="o_status">
                        <option value="????????????" <?=($r[o_status]=="????????????")?"selected":""?>>????????????</option>
                        <option value="????????????" <?=($r[o_status]=="????????????")?"selected":""?>>????????????</option>
                        <option value="????????????" <?=($r[o_status]=="????????????")?"selected":""?>>????????????</option>
                        <option value="??????" <?=($r[o_status]=="??????")?"selected":""?>>??????</option>
                    </select>
                    <?php
                    if($r[o_service]=="?????? ??????"){
                        ?>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????? ????????????<br>
                        </label>
                        <input type="tel" class="form-control phone" name="mc_tel" pattern="[0-9]{2,3}-[0-9]{3,4}-[0-9]{4}" maxlength="13" value="<?=$r[mc_tel]?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                           ???????????? ?????????<br>
                        </label>
                        <input class="form-control" autocomplete="off" id="child_end_datepicker" name="o_end_time" value="<?=($r[o_service_detail]=="?????????")?date("Y-m-d",strtotime($r[o_end_time])):"" ?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????????
                        </label>
                        <select class="form-control-mcc" name="o_d2">
                            <option value="Y" <?=($r[o_d2]=="Y")?"selected":""?>>??????</option>
                            <option value="N" <?=($r[o_d2]=="N")?"selected":""?>>??????</option>
                        </select>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d2_start"name="o_d2_start" value="<?=($r[o_d2_start] != "")?$r[o_d2_start]:""?>"/>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d2_end"  name="o_d2_end" value="<?=($r[o_d2_end] != "")?$r[o_d2_end]:""?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ?????????
                        </label>
                        <select class="form-control-mcc" name="o_d4">
                            <option value="Y" <?=($r[o_d4]=="Y")?"selected":""?>>??????</option>
                            <option value="N" <?=($r[o_d4]=="N")?"selected":""?>>??????</option>
                        </select>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d4_start" name="o_d4_start" value="<?=($r[o_d4_start] != "")?$r[o_d4_start]:""?>"/>
                        <input class="form-control-mcc timepicker" autocomplete="off" id ="d4_end"   name="o_d4_end" value="<?=($r[o_d4_end] != "")?$r[o_d4_end]:""?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ??????
                        </label>
                        <select class="form-control-mcc" name="o_snack">
                            <option value="Y" <?=($r[o_snack]=="Y")?"selected":""?>>??????</option>
                            <option value="N" <?=($r[o_snack]=="N")?"selected":""?>>??????</option>
                        </select>
                        <input class="form-control-mcc60" name="o_snack_info" value="<?=$r[o_snack_info]?>"/>
                    </div>
                    <div class="form-group mb-3">
                        <label class="form-label">
                            ????????????
                        </label>
                        <input class="form-control-mcc60 temp" name="o_textarea" value="<?=$r[o_textarea]?>" placeholder="????????? ?????? ???????????? ???????????????."/>
                    </div>
                    <?php
                    }
                    ?>
                    <a href="admin-list-detail-cancel?o_no=<?=$r[o_no]?>" onclick="window.open(this.href, '_blank', 'location=no, width=1000, height=600'); return false;" class="btn btn-d btn-lg w-100 k-m-u-30">??????</a>
				</div>
			</div>
		</div>
	</div>
</div>
</form>
<!-- bloc-24 END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
<!-- ScrollToTop Button END-->


<!-- bloc-84 -->
<div class="bloc l-bloc" id="bloc-84">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12 col-sm-4 col-lg-12">
				<h4 class="mg-md text-center text-sm-start text-lg-center h4-style">
					Copyright @????????????????????????????????? 2021.
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-84 END -->

</div>
<!-- Main container END -->


<!-- Additional JS -->
<script src="./js/bootstrap.bundle.min.js?8370"></script>
<script src="./js/blocs.min.js?7275"></script>
<script src="./js/lazysizes.min.js" defer></script><!-- Additional JS END -->
<script src="./js/datetimepicker.options.js"></script>
</body>
</html>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="utf-8">
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, viewport-fit=cover">
    <link rel="shortcut icon" type="image/png" href="favicon.png">
    
	<link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css?2126">
	<link rel="stylesheet" type="text/css" href="style.css?491">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,800,300&display=swap&subset=latin,latin-ext' rel='stylesheet' type='text/css'>
    <title>login</title>


    
<!-- Analytics -->
 
<!-- Analytics END -->
    
</head>
<body>

<!-- Preloader -->
<div id="page-loading-blocs-notifaction" class="page-preloader"></div>
<!-- Preloader END -->


<!-- Main container -->
<div class="page-container">
    
<!-- bloc-0 -->
<div class="bloc l-bloc" id="bloc-0">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col">
				<h4 class="mg-md text-lg-center">
					마포커뮤니티케어<br> 관리자 시스템
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-0 END -->

<!-- login -->
<div class="bloc none bgc-white" id="login">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-4 offset-lg-4 auto">
				<form id="form_1" method="POST" action="login">
					<div class="form-group mb-3">
						<label class="form-label">
							아이디<br>
						</label>
						<input name= "a_id" id="id" class="form-control" required maxlength="20" data-validation-required-message="아이디를 입력해 주세요." />
					</div>
					<div class="form-group mb-3">
						<label class="form-label">
							패스워드
						</label>
						<input name="a_pw" id="passwd" class="form-control" type="password" required data-validation-required-message="패스워드를 입력해 주세요." maxlength="20" />
						<div class="divider-h divider-login-padding">
							<span class="divider"></span>
						</div>
					</div>
					<div class="text-center">
						<button class="bloc-button btn btn-lg w-100 text-white btn-d" type="submit">
							로그인
						</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<!-- login END -->

<!-- ScrollToTop Button -->
<a class="bloc-button btn btn-d scrollToTop" onclick="scrollToTarget('1',this)"><svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 32 32"><path class="scroll-to-top-btn-icon" d="M30,22.656l-14-13-14,13"/></svg></a>
<!-- ScrollToTop Button END-->


<!-- bloc-84 -->
<div class="bloc l-bloc" id="bloc-84">
	<div class="container bloc-lg">
		<div class="row">
			<div class="col-12 col-sm-4 col-lg-12">
				<h4 class="mg-md text-center text-sm-start text-lg-center h4-style">
					Copyright @마포구고용복지지원센터 2021.
				</h4>
			</div>
		</div>
	</div>
</div>
<!-- bloc-84 END -->

</div>
<!-- Main container END -->
    


<!-- Additional JS --><script src="./js/jquery.min.js"></script>


<script src="./js/bootstrap.bundle.min.js?8370"></script>
<script src="./js/blocs.min.js?7275"></script>
<script src="./js/jqBootstrapValidation.js"></script>
<script src="./js/formHandler.js?9377"></script>
<script src="./js/lazysizes.min.js" defer></script>
<!-- Additional JS END -->


</body>
</html>

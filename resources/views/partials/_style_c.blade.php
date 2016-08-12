<style type="text/css">
	@media (max-width: 480px) {
		.panel > .create-idea > form > .panel-body > .cont > .i-img {
			max-height: 100px;
		}
		.panel > .create-idea > form > .panel-body > .cont > .i-img > .img-drop {
			bottom: 20px;
		}
	}
	@media (min-width: 480px) {
		.panel > .create-idea > form > .panel-body > .cont > .i-img {
			max-height: 250px;
		}
		.panel > .create-idea > form > .panel-body > .cont > .i-img > .img-drop {
			bottom: 100px;
		}
	}
	@media (min-width: 768px) {
		.panel > .create-idea > form > .panel-body > .cont > .i-img > .img-drop {
			bottom: 100px;
		}
	}
	@-webkit-keyframes load3 {
		0% {
		-webkit-transform: rotate(0deg);
		transform: rotate(0deg);
		}
		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
	@keyframes load3 {
		0% {
			-webkit-transform: rotate(0deg);
			transform: rotate(0deg);
		}
		100% {
			-webkit-transform: rotate(360deg);
			transform: rotate(360deg);
		}
	}
	.loader {
		position: relative;
		animation: load3 1.4s infinite linear;
		-webkit-animation: load3 1.4s infinite linear;
		transform: translateZ(0);
		-webkit-transform: translateZ(0);
		-ms-transform: translateZ(0);
	}
	.panel > .panel-heading {
		background-color: #fff;
		border: none;
	}
	.panel > .create-idea > .loader {
		margin: 30px 0;
	}
	.panel > .create-idea > .panel-footer {
		background-color: #fff;
		border-top: 1px solid #e5e5e5;
	}
	.panel > .create-idea > form > .panel-body > .img {
	}
	.panel > .create-idea > form > .panel-body > .img > img {
		width: 100%;
		height: 100%;
		border-radius: 50%;
	}
	.panel > .create-idea > form > .panel-body > .cont {
		padding-left: 10px;
	}
	.panel > .create-idea > form > .panel-body > .cont > *,
	.panel > .create-idea > form > .panel-body > .cont > #_answers > .ans-group > .ans {
		border: none;
	}
	.panel > .create-idea > form > .panel-body > .cont > .t,
	.panel > .create-idea > form > .panel-body > .cont > .opt,
	.panel > .create-idea > form > .panel-body > .cont > .d,
	.panel > .create-idea > form > .panel-body > .cont > #_answers > .ans-group > .ans {
		width: 100%;
		padding: 5px 10px;
		border-top: 1px solid #e5e5e5;
	}
	.panel > .create-idea > form > .panel-body > .cont > #_answers > .ans-group:last-child > .ans {
		border-bottom: 1px solid #e5e5e5;
		margin-bottom: 5px;
	}
	.panel > .create-idea > form > .panel-body > .cont > .s,
	.panel > .create-idea > form > .panel-body > .cont > .e {
		padding: 5px 10px;
		border-top: 1px solid #e5e5e5;
	}
	.panel > .create-idea > form > .panel-body > .cont > .opt {
		color: #a9a9a9;
	}
	.panel > .create-idea > form > .panel-body > .cont > .opt > * {
		padding: 0;
		color: #000;
	}
	.panel > .create-idea > form > .panel-body > .cont > .d {
		resize: none;
	}
	.panel > .create-idea > form > .panel-body > .cont > #_answers > .ans-group > .ans-dismiss {
		right: 5px;
		height: 20px;
		width: 20px;
		margin: 6px 0;
		padding: 0;
		border: 1px solid #e5e5e5;
		border-radius: 50%;
		position: absolute;
		font-size: small;
		color: #a9a9a9;
		cursor: pointer;
	}
	.panel > .create-idea > form > .panel-body > .cont > .add-answer {
		margin-bottom: 5px;
		border: 1px solid #e5e5e5;
		border-radius: 12px;
		background: none;
		color: #a9a9a9;
	}
	.panel > .create-idea > form > .panel-body > .cont > .i-img {
		width: 50px;
		height: 50px;
		border: 1px solid #e5e5e5;
		border-radius: 5px;
		background: url({{ url('img/plus.png') }}) no-repeat;
		background-position: 50%;
		background-size: 25px;
	}
	.panel > .create-idea > form > .panel-body > .cont > .i-img > .img-up {
		width: 100%;
		height: 100%;
		display: block;
		opacity: 0;
		cursor: pointer;
	}
	.panel > .create-idea > form > .panel-body > .cont > .i-img > .img-drop {
		width: 100%;
		bottom: 100px;
		position: absolute;
		display: none;
		color: #7e97ba;
		font-weight: bold;
	}
	.panel > .create-idea > form > .panel-body > .cont > .i-img > .img-dismiss {
		float: right;
		display: none;
		height: 25px;
		width: 25px;
		margin: 10px 10px -35px 0;
		padding: 3px;
		border: 1px solid #fff;
		border-radius: 50%;
		position: relative;
		font-size: small;
		background-color: rgba(0, 0, 0, .7);
		color: #fff;
		cursor: pointer;
	}
</style>


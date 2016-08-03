<style type="text/css">
	@media (max-width: 480px) {
		.panel > form > .panel-body > .cont > .i-img {
			max-height: 100px;
		}
	}
	@media (min-width: 480px) {
		.panel > form > .panel-body > .cont > .i-img {
			max-height: 250px;
		}
	}
	.panel > .panel-heading {
		background-color: #fff;
		border: none;
		border-bottom: 1px solid #e5e5e5;
	}
	.panel > form > .panel-footer {
		background-color: #fff;
		border-top: 1px solid #e5e5e5;
	}
	.panel > form > .panel-body > .img {
	}
	.panel > form > .panel-body > .img > img {
		width: 100%;
		height: 100%;
		border-radius: 50%;
	}
	.panel > form > .panel-body > .cont {
		padding-left: 10px;
	}
	.panel > form > .panel-body > .cont > * {
		border: none;
	}
	.panel > form > .panel-body > .cont > .t {
		width: 100%;
		padding: 5px 10px;
		border-top: 1px solid #e5e5e5;
	}
	.panel > form > .panel-body > .cont > .d {
		width: 100%;
		padding: 5px 10px;
		border-top: 1px solid #e5e5e5;
		resize: none;
	}
	.panel > form > .panel-body > .cont > .i-img {
		width: 50px;
		height: 50px;
		border: 1px solid #e5e5e5;
		border-radius: 5px;
		background: url({{ url('img/plus.png') }}) no-repeat;
		background-position: 50%;
		background-size: 25px;
	}
	.panel > form > .panel-body > .cont > .i-img > .img-up {
		height: 100%;
		width: 100%;
		display: block;
		opacity: 0;
		cursor: pointer;
	}
	.panel > form > .panel-body > .cont > .i-img > .img-dismiss {
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


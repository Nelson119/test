<?php the_content(); ?>
<?php wp_link_pages(['before' => '<nav class="page-nav"><p>' . __('Pages:', 'sage'), 'after' => '</p></nav>']); ?>
<figure class="kv" style="background-image:url(<?php theme_asset('images/contact/kv.png')?>) ">
</figure>
<nav class="taxonomy">
	<ul>
		<li><a href="javascript:" titile="外部關係">外部關係</a></li>
		<li><a href="javascript:" titile="加入團隊">加入團隊</a></li>
		<li><a href="javascript:" titile="聯絡我們">聯絡我們</a></li>
	</ul>
</nav>
<section class="container">
	
	<ul class="nav nav-tabs row">
		<li class="active text-left col-lg-4 col-md-4 col-sm-4 col-xs-4">
			<a data-toggle="tab" href="#tab-tedx-in-taiwan">
				<figure class="background"><img src="<?php theme_asset('images/contact/tab-tedx-in-taiwan.png')?>" alt="TEDx in Taiwan"></figure>
				<h3>全台TEDx<span class="sub">TEDx in Taiwan</span></h3>				
			</a>
		</li>
		<li class="text-left col-lg-4 col-md-4 col-sm-4 col-xs-4">
			<a data-toggle="tab" href="#tab-regional-teaching-resource-center">
				<figure class="background"><img src="<?php theme_asset('images/contact/tab-regional-teaching-resource-center.png')?>" alt="TEDx in Taiwan"></figure>
				<h3>雲嘉南學校<span class="sub">Regional Teaching Resource Center</span></h3>				
			</a>
		</li>
		<li class="text-left col-lg-4 col-md-4 col-sm-4 col-xs-4">
			<a data-toggle="tab" href="#tab-cooperation-partners">
				<figure class="background"><img src="<?php theme_asset('images/contact/tab-cooperation-partners.png')?>" alt="TEDx in Taiwan"></figure>
				<h3>合作夥伴<span class="sub">Cooperation Partners</span></h3>
			</a>
		</li>
	</ul>

	<div class="tab-content">
		<div id="tab-tedx-in-taiwan" class="tab-pane fade active in">
			<ul class="row">
				<?php $i = 10?>
				<?php while($i--):?>
				<li class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<a class="tedx" target="_blank" href="https://www.google.com/maps?q=60004 嘉義市鹿寮里學府路300號"><img src="<?php theme_asset('images/contact/tedx-taipei-american-school.png')?>"></a>
				</li>
				<?php endwhile?>
			</ul>
		</div>
		<div id="tab-regional-teaching-resource-center" class="tab-pane fade"> 
			<ul class="row">
				<?php $i = 5?>
				<?php while($i--):?>
				<li class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
					<h3><a class="site" target="_blank" href="http://www.ncyu.edu.tw">國立嘉義大學</a></h3>
					<a class="address hidden-xs" target="_blank" href="https://www.google.com/maps?q=60004 嘉義市鹿寮里學府路300號">60004 嘉義市鹿寮里學府路300號</a>
					<a class="phone hidden-xs" target="_blank" href="tel:05-2717000">05-2717000</a>
					<a class="site hidden-xs" target="_blank" href="http://www.ncyu.edu.tw">www.ncyu.edu.tw</a>
				</li>
				<?php endwhile?>
			</ul>
		</div>
		<div id="tab-cooperation-partners" class="tab-pane fade">
			<ul class="row">
				<li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<figure style="background-image: url(<?php theme_asset('images/contact/ccu.png')?>)">
					</figure>
					<p class="name">中正大學教學卓越計畫</p>
				</li>
				<li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<figure style="background-image: url(<?php theme_asset('images/contact/housein.png')?>)">
					</figure>
					<p class="name">Livehouse</p>
				</li>
				<li class="col-lg-4 col-md-4 col-sm-4 col-xs-4">
					<figure style="background-image: url(<?php theme_asset('images/contact/tedxccu.png')?>)">
					</figure>
					<p class="name">TEDxChungChengU策展團隊</p>
				</li>
			</ul>
		</div>
	</div>

	<section class="recruit">
		<ul class="row two-col">
			<li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure class="nojob">
					<figcaption>固定招募<span>REGULAR RECRUITMENT</span></figcaption>
					<h5>敬請期待春季及秋季人才招募</h5>
				</figure>
			</li>
			<li class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<figure class="jobs">
					<figcaption>長期招募<span>LONG TERM RECRUITING</span></figcaption>
					<ul class="jobs-container">
						<?php $i = 5?>
						<?php while($i--):?>
						<li>
							<h3>平面設計師</h3>
							<h6>工作說明：</h6>
							<span>負責活動、網站平面設計等工作。</span>
							<h6>需求條件：</h6>
							<span>會使用Photoshop、Illustrator軟體進行平面設計者。具html等網頁製作基礎知識者尤佳。</span>
							<hr>
							<span>意者請將作品集和履歷寄至 <a target="_blank" href="mailto:tedxccu.chiayi@gmail.com?subject=我想要加入&amp;body=///請別忘了附件///">tedxccu.chiayi@gmail.com</a></span>
							<h6>主旨填寫：<span>我想要加入</span></h6>

						</li>
						<?php endwhile?>
					</ul>
				</figure>
			</li>
		</ul>
	</section>


	<div class="panel-group row" id="qa">
		<h3>常見問題<span>FAQ</span></h3>
  		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a href="javascript:">
						要英文很好才能加入你們嗎?
						<svg viewBox="0 0 15 15">
						<polygon points="8.6,0 6.4,0 6.4,6.4 0,6.4 0,8.6 6.4,8.6 6.4,15 8.6,15 8.6,8.6 15,8.6 15,6.4 
							8.6,6.4 "/>
						</svg>
					</a>
				</h4>
			</div>
			<div class="panel-collapse collapsing">
				<div class="panel-body">不用，只要你認同我們的理念即可加入!</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="collapsed" href="javascript:">如何報名和如何報名和參如何報名和參加活動加活動如何報名和參加活動參加活動？
						<svg viewBox="0 0 15 15">
						<polygon points="8.6,0 6.4,0 6.4,6.4 0,6.4 0,8.6 6.4,8.6 6.4,15 8.6,15 8.6,8.6 15,8.6 15,6.4 
							8.6,6.4 "/>
						</svg>
					</a>
				</h4>
			</div>
			<div class="panel-collapse collapsing">
				<div class="panel-body">不用，只要你認同我們的理念即可加入!</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="collapsed" href="javascript:">
						如何報名和參如如何報名和參加活動如何報名和參加活動何報名和參加活動如何報名和參加活動加活動？
						<svg viewBox="0 0 15 15">
						<polygon points="8.6,0 6.4,0 6.4,6.4 0,6.4 0,8.6 6.4,8.6 6.4,15 8.6,15 8.6,8.6 15,8.6 15,6.4 
							8.6,6.4 "/>
						</svg>
					</a>
				</h4>
			</div>
			<div class="panel-collapse collapsing">
				<div class="panel-body">不用，只要你認同我們的理念即可加入!</div>
			</div>
		</div>
  		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="collapsed" href="javascript:">
						如何報名和參加活如何報名和參加活動如何報名和參加活動動？
						<svg viewBox="0 0 15 15">
						<polygon points="8.6,0 6.4,0 6.4,6.4 0,6.4 0,8.6 6.4,8.6 6.4,15 8.6,15 8.6,8.6 15,8.6 15,6.4 
							8.6,6.4 "/>
						</svg>
					</a>
				</h4>
			</div>
			<div class="panel-collapse collapsing">
				<div class="panel-body">不用，只要你認同我們的理念即可加入!</div>
			</div>
		</div>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4 class="panel-title">
					<a class="collapsed" href="javascript:">如何報名和參加如何報名和參加活動活動？
						<svg viewBox="0 0 15 15">
						<polygon points="8.6,0 6.4,0 6.4,6.4 0,6.4 0,8.6 6.4,8.6 6.4,15 8.6,15 8.6,8.6 15,8.6 15,6.4 
							8.6,6.4 "/>
						</svg>
					</a>
				</h4>
			</div>
			<div class="panel-collapse collapsing">
				<div class="panel-body">不用，只要你認同我們的理念即可加入!</div>
			</div>
		</div>
	</div>




	<section class="form">
		<h3>聯絡我們<span>CONTACT US</span></h3>
		<section class="row">
			<?php echo do_shortcode('[contact-form-7 id="39" title="cf7-message"]')?>
		</section>
	</section> 
</section>

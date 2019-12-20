<?php
use yii\helpers\Html;
use yii\helpers\Url;

//Постоянные мета теги
$this->title = '';
$this->registerMetaTag(['name' => 'keywords', 'content' =>  '' ]);
$this->registerMetaTag(['name' => 'description', 'content' =>  '']);

//OG теги
$this->registerMetaTag(['property' => 'og:title', 'content' => $this->title]);
$this->registerMetaTag(['property' => 'og:type', 'content' => 'article']);
$this->registerMetaTag(['property' => 'og:url', 'content' => Url::current([], true)]);
$this->registerMetaTag(['property' => 'og:image', 'content' => Url::base(true).'/images/social.png']);

$this->registerMetaTag(['itemprop' => 'name', 'content' => $this->title]);
$this->registerMetaTag(['itemprop' => 'description', 'content' => '']);
$this->registerMetaTag(['itemprop' => 'image', 'content' => Url::base(true).'/images/social.png']);


?>




<header class="home-header">
	<section class="top-menu">
		<div class="wrapper">
			<a href="/" class="top-menu-logo">
				<img src="images/template/logo.png">
				I-Pets
			</a>
			<a href="tel:+380667912739" class="top-menu-tel">+38-066-791-27-39</a>
			<a href="/login" class="btn m-btn">Войти в систему</a>
		</div>
	</section>
	
	<div class="header-slider">
		<div class="header-item" style="background-image:url(images/template/slide1.jpg)">
			<div class="wrapper _left">
				<div class="header-item-title">Системный учет</div>
				<div class="header-item-subtitle">Удобный, современный, облачный сервис для ведения базы учета клубами любителей животных.</div>
				<a href="#mcallback" data-lity class="btn s-btn">Оставить заявку</a>
			</div>
		</div>
		
		<div class="header-item" style="background-image:url(images/template/slide2.jpg)">
			<div class="wrapper">
				<div class="header-item-title">Административный учет </div>
				<div class="header-item-subtitle">Удобный, современный, облачный сервис для ведения базы учета клубами любителей животных.</div>
				<a href="#mcallback" data-lity class="btn s-btn">Оставить заявку</a>
			</div>
		</div>
		
		<div class="header-item" style="background-image:url(images/template/slide3.jpg)">
			<div class="wrapper">
				<div class="header-item-title">Партнерские программы</div>
				<div class="header-item-subtitle">Удобный, современный, облачный сервис для ведения базы учета клубами любителей животных.</div>
				<a href="#mcallback" data-lity class="btn s-btn">Оставить заявку</a>
			</div>
		</div>
	</div>
</header>





<section class="what-home">
	<div class="wrapper">
		<div class="home-title">Что такое i-pets?</div>
		
		<div class="what-flex">
			<div class="what-flex-item">
				<div class="what-flex-img"><i class="fas fa-network-wired"></i></div>
				Современный продукт учета животных в реальном времени
			</div>
			
			<div class="what-flex-item">
				<div class="what-flex-img"><i class="fas fa-hands-helping"></i></div>
				Эффективный бизнес сервис с множеством партнерских програм
			</div>
			
			<div class="what-flex-item">
				<div class="what-flex-img"><i class="fas fa-tools"></i></div>
				Удобный инструмент для работы в условиях офиса, а так же вовремя выставок CAСIB, MONO, CAC.
			</div>
		</div>	
	</div>
</section>


<section class="scope-home">
	<div class="wrapper">
		<div class="home-title">Что может i-pets?</div>
	
		<div class="scope-row">
			<div class="scope-row-text">
				<ul>
					<li>Создание карточки владельца животного.</li>
					<li>Создание карточки животного с учетом данных родословной и потомства.</li>
					<li>Учет вязки и приплода.</li>
					<li>Щенячья карта.</li>
					<li>Рейтинг питомцев.</li>
					<li>Участие в выставках и награды животного.</li>
					<li>Электронный учет животных, чипирование, qr-коды на ошейнике.</li>
					<li>Печать документов.</li>
				</ul>
			</div>
			<div class="scope-row-img" style="background-image:url(images/template/system.jpg)"><span style="background:#02bdc7;"></span><strong>Системный <br> учёт</strong></div>
		</div>
		
		<div class="scope-row">
			<div class="scope-row-img" style="background-image:url(images/template/admin.jpg)"><span style="background:#fc4067;"></span><strong>Административный <br> учёт</strong></div>
			<div class="scope-row-text">
				<p><strong>Отчет о задолженностях</strong><br>Формирование отчета должников по оплатам за участие в клубе, выставках и другое.</p>
				<p><strong>Уведомления участникам клуба</strong><br>Возможность рассылки уведомлений через смс или на электронную почту.</p>
				<p><strong>QR-код</strong><br>Возможность генерации QR-кода на ошейник для идентификации животного.</p>
				<p><strong>Чипирование собак</strong><br>Хранение номера чипа в базе с целью идентификации животного.</p>
			</ul>
			</div>
		</div>
		
		<div class="scope-row">
			<div class="scope-row-text">
				<p><strong>Привлечение участников</strong><br> Привлечение новых участников клуба, любителей собак. Увеличение численности питомцев в клубе. Отбор лучших кандидатов для вязки.</p>
				<p><strong>Приоритет перед другими клубами</strong><br> Отбор лучших питомцев для выставки CAСIB, MONO, CAC, рейтинг питомцев по породам, по титулам, по выставкам, по классам с возможностью выгрузки данных</p>
				<p><strong>Изменение индекса потребительской лояльности</strong><br>Увеличение запаса доверия к клубу от иностранных участников за счет открытого рейтинга лучших питомцев. Узнаваемость клуба</p>
			</div>
			<div class="scope-row-img" style="background-image:url(images/template/marketing.jpg)"><span style="background:#ffb600;"></span><strong>Маркетинговые <br> цели</strong></div>
		</div>
		
		<div class="scope-row">
			<div class="scope-row-img" style="background-image:url(images/template/partners.jpg)"><span style="background:#6af788;"></span><strong>Партнерские <br>программы</strong></div>
			<div class="scope-row-text">
				<ul>
					<li>Кинологические клубы Украины, СНГ, Европы</li>
					<li>Выставки собак национальные ( CAC ) и международные (CACIB), монопородные выставки собак</li>
					<li>Подготовка собак-поводырей</li>
					<li>Кинологические услуги</li>
					<li>Дрессировка собак</li>
					<li>Ветеринария</li>
					<li>Корм для собак и кошек</li>
					<li>Груминг животных</li>
					<li>Гостиницы для животных</li>
					<li><strong>Благотворительность</strong></li>
				</ul>
			</div>
		</div>
		
		<div class="scope-row">
			<div class="scope-row-text">
				<ul>
					<li>Печать документов владельцев и собак</li>
					<li>Каталоги выставок
					<li>Печать диплома</li>
					<li>Электронный договор </li>
					<li>Отчет всех участников клуба </li>
					<li>Электронная заявка </li>
					<li>Электронные формы </li>
				</ul>
			</div>
			<div class="scope-row-img" style="background-image:url(images/template/edocuments.jpg)"><span style="background:#02bdc7;"></span>
                <strong>Электронный <br> документооборот</strong></div>
		</div>
		
	</div>
</section>


<section class="what-home">
	<div class="wrapper">
		<div class="home-title">Преимущества <br> ведения данных в i-pets.club:</div>
		
		<div class="what-flex">
			<div class="what-flex-item">
				<div class="what-flex-img"><i class="fas fa-tachometer-alt"></i></div>
				<div class="what-flex-item-title">Скорость</div>
				Быстрота доступа к данным в любой точке земного шара при наличии интернета, быстрая генерация
                необходимых форм и отчетов.
			</div>
			
			<div class="what-flex-item">
				<div class="what-flex-img"><i class="fas fa-shield-alt"></i></div>
				<div class="what-flex-item-title">Надёжность</div>
				Гарантия сохранности данных по правилам GDPR (автоматическое резервное копирование базы данных).
			</div>
			
			<div class="what-flex-item">
				<div class="what-flex-img"><i class="fas fa-user-plus"></i></div>
				<div class="what-flex-item-title">Возможность</div>
				Многопользовательский ввод информации (одновременная работа пользователей в программе) и широкая
                партнерская программа (наличие единой базы данных партнеров и услуг в твоем городе).
			</div>
			
		</div>	
	</div>
</section>


<section class="form-home">
	<div class="wrapper">
		<div class="home-title">Хотите узнать больше об i-pets?</div>
		
		<div class="form-home-wrapper">
			<div class="form-home-title">Заполните форму,</div>
			<div class="form-home-subtitle">чтобы получить полную презентацию в формате PDF</div>
			
			<form class="ajaxform" action="/home-send">
				<input type="text" placeholder="Ваше имя *" class="m-input" name="name" required>
				<input type="text" placeholder="Ваш телефон *" class="m-input" name="tel" required>
				<input type="email" placeholder="Ваше e-mail *" class="m-input" name="email" required>
				
				<input type="hidden" name="form" value="Узнать больше об i-pets">
				
				<?=Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []);?>
				<button class="btn s-btn">Получить</button>
			</form>
		</div>
	</div>
</section>
	
	
<footer class="footer">
	<div class="wrapper">
		<div class="footer-right">
			<a href="/" class="footer-logo">
				<img src="images/template/logo.png">
				I-Pets
			</a>
			<div>
				<p>ОГРН: 123987455579130</p>
				<p>ИНН 477443451</p>
			</div>
		</div>
		<a href="#mcallback" data-lity class="btn t-btn">Зарегестрироваться в системе</a>
		
		<div class="footer-left">
			<div class="footer-p">Появились вопросы? Звоните!</div>
			<a href="tel:+380667912739" class="footer-tel">+38-066-791-27-39</a>
			<a href="#footercallback" data-lity class="footer-callback">Заказать обратный звонок</a>
			<a href="#policy" data-lity class="footer-policy">Положение об обработке персональных данных</a>
		</div>
	</div>
</footer>


<div class="lity-hide form-modal" id="footercallback">
	<div class="form-modal-title">Заполните форму</div>
	<div class="form-modal-subtitle">Чтобы получить консультацию менеджера по телефону</div>
			
	<form class="ajaxform" action="/home-send">
		<input type="text" placeholder="Ваше имя *" class="m-input" name="name" required>
		<input type="text" placeholder="Ваш телефон *" class="m-input" name="tel" required>
	
		<input type="hidden" name="form" value="Футер - заказать звонок">
		<?=Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []);?>
		<button class="btn s-btn">Заказать звонок</button>
	</form>
</div>


<div class="lity-hide form-modal" id="mcallback">
	<div class="form-modal-title">Заявка на подключение</div>
	<div class="form-modal-subtitle">Чтобы зарегестрировать в системе оставьте заявку и наш менеджер свяжеться с Вам</div>
	
	<form class="ajaxform" action="/home-send">
		<input type="text" placeholder="Ваше имя *" class="m-input" name="name" required>
		<input type="text" placeholder="Ваш телефон *" class="m-input" name="tel" required>
		<input type="email" placeholder="Ваше e-mail *" class="m-input" name="email" required>
				
		<input type="hidden" name="form" value="Оставить заявку">
		<?=Html :: hiddenInput(\Yii :: $app->getRequest()->csrfParam, \Yii :: $app->getRequest()->getCsrfToken(), []);?>
		<button class="btn s-btn">Оставить заявку</button>
	</form>
</div>


<div class="lity-hide policy-modal" id="policy">
	<div class="policy-modal-title">Рыба текст — тестовый текст на сайт</div>
	<p>Что такое текст «рыба» знают все, кто работает с версткой журналов, дизайном и разработкой сайтов.
        Этот текст служит для демонстрации того, как контент впоследствии будет выглядеть на готовой странице,
        чтобы увидеть, правильно ли размещаются абзацы, отступы, хорошо ли смотрятся шрифты. Такие рыбные тексты,
        как правило, не несут никакой смысловой нагрузки.</p>
	<div class="policy-modal-title">Генератор текста онлайн</div>
	<p>На моменте создания макета у дизайнера нет готовых текстов, поэтому генерируется некий демонстрационный текст.
        Некоторые студии предпочитают писать такой текст самостоятельно, но чаще используются готовые тексты,
        созданные программой – генератором текста. Более того, у такого текста есть один неоспоримый плюс –
        поскольку читать его неинтересно, внимание переключается именно на оформление макета, заказчик будет
        сосредоточен на изучении формы, дизайна, верстки.</p>
	<div class="policy-modal-title">Как сгенерировать случайный текст на русском или английском?</div>
	<p>Уже много веков в книгопечатании используется стандартный рыбный текст, начинающийся со слов Lorem ipsum,
        – это отрывок с вырванными фразами из труда древнеримского философа Цицерона. Именно его используют в верстке
        чаще всего. Однако если ваш проект ориентирован на кириллицу, этот латинский текст не подойдет. Вообще лучше
        использовать тексты на том языке, который будет впоследствии использоваться.</p>
	<p>А чтобы создать текст-рыбу на русском языке, проще всего будет воспользоваться рандомизатором текста – программой,
        которая случайным образом генерирует рыбные тексты. Именно такую программу вы видите на этом сайте.
        Как ею воспользоваться</p>
</div>



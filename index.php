<?php
session_start();
$_SESSION['csrf_token'] = sha1(uniqid(mt_rand(), true));
$_SESSION['csrf_generated_at'] = $_SERVER['REQUEST_TIME'];

?>
<!DOCTYPE html>
<html lang="ja">
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-131373055-1"></script>
        <script>
            // var gaAcceptedField = 'ga_accepted';
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            // function enableTracking() {
            //     gtag('js', new Date());
            //     gtag('config', 'UA-131373055-1');
            // }
            gtag('js', new Date());
            gtag('config', 'UA-131373055-1');

            // if (localStorage.getItem(gaAcceptedField)) {
            // enableTracking();
            // }
        </script>

        <!-- meta -->
        <title>Hiroshi Muraoka</title>

        <meta name="description" content="滋賀県在住のソフトウェアエンジニアのポートフォリオサイト" />
        <meta name="keywords" content="京都, 大阪, エンジニア, 人工知能, ウェブ開発" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <!-- favicon -->
        <link
            rel="apple-touch-icon"
            sizes="180x180"
            href="/img/favicon/apple-touch-icon.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="32x32"
            href="/img/favicon/favicon-32x32.png"
        />
        <link
            rel="icon"
            type="image/png"
            sizes="16x16"
            href="/img/favicon/favicon-16x16.png"
        />
        <link
            rel="mask-icon"
            href="/img/favicon/safari-pinned-tab.svg"
            color="#5bbad5"
        />
        <link rel="shortcut icon" href="/img/favicon/favicon.ico" />
        <meta name="msapplication-TileColor" content="#da532c" />
        <meta
            name="msapplication-config"
            content="/img/favicon/browserconfig.xml"
        />
        <meta name="theme-color" content="#ffffff" />
        <!-- style -->
        <link
            href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Roboto+Condensed:300,400,700"
            rel="stylesheet"
        />
        <link href="https://unpkg.com/ionicons@4.4.8/dist/css/ionicons.min.css" rel="stylesheet">
        <link rel="stylesheet" href="/css/style.css" />

        <!-- pwa -->
        <link rel="manifest" href="/manifest.json" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="apple-mobile-web-app-title" content="H.Muraoka" />
        <link rel="apple-touch-icon" href="/img/favicon/mstile-150x150.png" sizes="150x150">
        <meta name="theme-color" content="#3f51b5" />
    </head>

    <body>
        <div class="wrapper">
            <header id="header">
                <div class="header-wrapper">
                    <nav>
                        <div class="navbar-wrapper">
                            <div class="navbar-wrapper__hamburger">
                                <button class="hamburger">
                                    <span></span>
                                    <span></span>
                                    <span></span>
                                </button>
                            </div>
                            <ul class="navbar-wrapper__list">
                                <li class="navbar-wrapper__item">
                                    <a href="#about">About</a>
                                </li>
                                <li class="navbar-wrapper__item">
                                    <a href="#skills">Skills</a>
                                </li>
                                <li class="navbar-wrapper__item">
                                    <a href="#awards">Awards</a>
                                </li>
                                <li class="navbar-wrapper__item">
                                    <a href="#works">Works</a>
                                </li>
                                <li class="navbar-wrapper__item">
                                    <a href="#footer">Contact</a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </header>
            <div><a class="square-arrow-up go-to-top" href="#hero"></a></div>
            <div class="cookie-policy">
                <p class="cookie-policy__text">
                    <i class="icon ion-alert"></i>
                    当サイトでは利便性向上や閲覧の追跡のためにGoogle提供のサービスによりCookieが使用されています。
                    サイトの閲覧を続けた場合、Cookieの使用に同意したことになります。
                </p>
                <div class="cookie-policy__btn-box">
                    <button class='btn btn--colored cookie-policy__btn--accept'>同意する</button>
                    <button class='btn btn--white cookie-policy__btn--decline'>拒否する</button>
                </div>
            </div>
            <main>
                <section id="hero">
                    <div class="hero-wrapper">
                        <!-- background-image in CSS -->
                        <div class="hero-container">
                            <h1 class="hero-container__heading">
                                Hiroshi Muraoka
                            </h1>
                            <div class="hero-container__description">
                                Software Engineer
                            </div>
                            <div>
                                <a
                                    href="/pdfs/hmuraoka_resume_JP.pdf"
                                    download="hmuraoka_resume_JP.pdf"
                                    class="btn"
                                    >履歴書はこちら</a
                                >
                            </div>
                        </div>
                    </div>
                </section>
                <section id="about">
                    <div class="about-wrapper">
                        <h2 class="section-heading">About</h2>
                        <div class="about-container">
                            <div class="about-container__description">
                                <h3 class="about-container__heading">
                                    村岡 宏是<span>Hiroshi Muraoka</span>
                                </h3>
                                <p class="about-container__paragraph">
                                    1988年生まれ。滋賀県在住。<br />
                                    大学院修了後に国内証券会社のリサーチ部門に勤務し、3年後に退職して1年間の世界一周に出発。
                                    帰国後はKaggleに参加しながら、ウェブ関連の技術を幅広く独学し、現在に至る。<br />
                                    Deep
                                    Learning等の機械学習モデルの構築(PyTorch/Keras/scikit-learn+pandas/numpy)、
                                    レスポンシブな静的ページ作成(HTML5+CSS3+jQuery)、
                                    フルスタックフレームワークを利用したウェブサービスの作成(Revel)、
                                    REST APIの作成(Gin/Node.js)など。<br />
                                    趣味はお酒と旅行と動物。
                                </p>
                            </div>
                            <div class="about-container__img-box"></div>
                        </div>
                    </div>
                </section>
                <section id="skills">
                    <div class="skills-wrapper">
                        <h2 class="section-heading section-heading--white">
                            Skills
                        </h2>
                        <div class="carousel">
                            <div class="carousel__wrapper">
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">Python</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--python">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    Excelでは困難な規模のデータ集計・加工やスクレイピングによるデータ収集、統計分析に利用。<br />
                                                    また、Deep
                                                    LearningやBoosting等の機械学習モデルをKaggle上位10%相当の性能で安定して構築。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                    機械学習:
                                                    Keras/PyTorch/scikit-learn<br />
                                                    データ処理:
                                                    pandas/numpy/matplotlib
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">Go</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--go">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    認証機能付きのフルスタックフレームワークによるWebアプリケーションや
                                                    REST APIの構築。Webセキュリティの基礎知識。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                    フレームワーク：Revel / Gin<br />
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">
                                            JavaScript
                                            <span class="small-word">(front)</span>
                                        </h3>
                                        <div class="card__pie">
                                            <div class="pie pie--javascript">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    React+ReduxによるSPAの構築。
                                                    HTML5+SCSS+jQueryを用いたレスポンシブな静的サイトの構築。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                    View関連：JQuery / HTML5 / SCSS / React+Redux<br />
                                                    バージョン：ES5 / ES6 / TypeScript<br />
                                                    開発ツール：npm / webpack / eslint / tslint / prettier
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">
                                            PostgreSQL
                                        </h3>
                                        <div class="card__pie">
                                            <div class="pie pie--sql">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    CRUD、GROUP
                                                    BY、JOIN、相関サブクエリ、トランザクション等、基本的なコマンドを利用可。<br />
                                                    SQLのアルゴリズムの理解。個人利用レベルでの設計の経験。
                                                </p>
                                            </div>
                                            <div class="card__keywords"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">Debian</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--debian">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    ls、grep、sed等、基本的なLinuxコマンドやGitによるバージョン管理。<br />
                                                    自作PCにOS(Ubuntu)をインストールし、計算用サーバとして利用。<br />
                                                    Raspberry
                                                    PI上にnginx+Apacheをインストールし、Webサーバとして利用。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                    各種ツール：Git / Vim /
                                                    Screen / Bash / VSCode /
                                                    nginx / CircleCI / Docker
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">Node.js</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--nodejs">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    MERN(MongoDB+Express+React+Node.js)スタックの学習時に利用。<br />
                                                    OAuth認証を利用したREST
                                                    APIの構築。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                    Webフレームワーク：Express
                                                    /passport2(OAuth2)<br />
                                                    ORM： mongoose
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">C/C++</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--c">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    主に在学時に学習目的で利用した他、高速化のため他言語から呼び出す関数など小規模の開発に利用。
                                                    基本的なアルゴリズムとデータ構造の実装。
                                                </p>
                                            </div>
                                            <div class="card__keywords"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">OCaml</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--ocaml">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                関数型プログラミングの学習のため使用。ダイクストラ法による経路探索アルゴリズムの構築。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                関数型言語
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">Excel</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--excel">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    資料作成のための図表作成。
                                                    外部ソースからのデータ取得から分析まで完結したツールを適宜VBAを駆使して構築可。
                                                </p>
                                            </div>
                                            <div class="card__keywords"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">R</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--r">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    Excelでは困難な規模のデータ集計・加工や統計分析に利用。
                                                </p>
                                            </div>
                                            <div class="card__keywords">
                                                <h4>キーワード</h4>
                                                <p class="card__paragraph">
                                                    データ処理：dplyr / tidyr /
                                                    ggplot2
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel__slide">
                                    <div class="card">
                                        <h3 class="card__heading">Others</h3>
                                        <div class="card__pie">
                                            <div class="pie pie--others">
                                                <div class="pie__right"></div>
                                                <div class="pie__left"></div>
                                                <div class="pie__center"></div>
                                            </div>
                                        </div>
                                        <div class="card__description">
                                            <div class="card__detail">
                                                <h4>概要</h4>
                                                <p class="card__paragraph">
                                                    Kotlin、デザイン、フロント高速化などに関して鋭意学習中。
                                                </p>
                                            </div>
                                            <div class="card__keywords"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel__pagination"></div>
                            <div class="carousel__controls">
                                <button class="carousel__prev"></button>
                                <button class="carousel__next"></button>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="awards">
                    <div class="awards-wrapper">
                        <h2 class="section-heading">Awards</h2>
                        <ul class="awards-container">
                            <li class="awards-container__item">
                                <div class="awards-container__date">
                                    2012年10⽉
                                </div>
                                <div class="awards-container__description">
                                    <h3 class="awards-container__heading">
                                        <a
                                            href="http://image-net.org/challenges/LSVRC/2012/results.html"
                                        >
                                            ImageNet Large Scale Visual
                                            Recognition Competition 2012 -
                                            Classification
                                        </a>
                                    </h3>
                                    <p class="awards-container__paragraph">
                                        2nd(研究室) / 8チーム
                                    </p>
                                    <p class="awards-container__paragraph">
                                        ⼤規模な画像データセット(120万枚1000カテゴリ)を利⽤して⾏われた⼈⼯知能系コンペティション
                                    </p>
                                </div>
                            </li>
                            <li class="awards-container__item">
                                <div class="awards-container__date">
                                    2016年5⽉
                                </div>
                                <div class="awards-container__description">
                                    <h3 class="awards-container__heading">
                                        <a
                                            href="https://www.kaggle.com/c/santander-customer-satisfaction"
                                        >
                                            Kaggle - Santander Customer
                                            Satisfaction
                                        </a>
                                    </h3>
                                    <p class="awards-container__paragraph">
                                        Gold Medal 2nd(個人) / 5123チーム
                                    </p>
                                    <p class="awards-container__paragraph">
                                        ⽶Santander
                                        Bank社の顧客満⾜度予測を⽬的に⾏われた⼈⼯知能系コンペティション
                                    </p>
                                </div>
                            </li>
                            <li class="awards-container__item">
                                <div class="awards-container__date">
                                    2016年11⽉
                                </div>
                                <div class="awards-container__description">
                                    <h3 class="awards-container__heading">
                                        <a
                                            href="https://www.kaggle.com/c/bosch-production-line-performance"
                                        >
                                            Kaggle - Bosch Production Line
                                            Performance
                                        </a>
                                    </h3>
                                    <p class="awards-container__paragraph">
                                        Bronze Medal 91th(個人) / 1373チーム
                                    </p>
                                    <p class="awards-container__paragraph">
                                        独Bosch社の組み⽴てラインにおける不良発⽣予測を⽬的に⾏われた⼈⼯知能系コンペティション(カナダ〜メキシコ滞在時にリモートで参加)
                                    </p>
                                </div>
                            </li>
                            <li class="awards-container__item">
                                <div class="awards-container__date">
                                    2018年6⽉
                                </div>
                                <div class="awards-container__description">
                                    <h3 class="awards-container__heading">
                                        <a
                                            href="https://www.kaggle.com/c/avito-demand-prediction"
                                        >
                                            Kaggle - Avito Demand Prediction
                                            Challenge
                                        </a>
                                    </h3>
                                    <p class="awards-container__paragraph">
                                        Silver Medal 66th(個人) / 1873チーム
                                    </p>
                                    <p class="awards-container__paragraph">
                                        露Avito社の提供するオンライン広告に対する購買予測を⽬的に⾏われた⼈⼯知能系コンペティション
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
                <div id="photos">
                    <div class="photos-container">
                        <ul class="photos-container__row">
                            <li class="photos-container__img"
                                data-src="/img/photos-11-min.jpg"
                                data-alt="Victria Falls">
                            </li>
                            <li class="photos-container__img"
                                data-src="/img/photos-12-min.jpg"
                                data-alt="Navagio">
                            </li>
                            <li class="photos-container__img"
                                data-src="/img/photos-13-min.jpg"
                                data-alt="Sepilok">
                            </li>
                            <li class="photos-container__img"
                                data-src="/img/photos-14-min.jpg"
                                data-alt="Kas">
                            </li>
                        </ul>
                        <ul class="photos-container__row">
                            <li class="photos-container__img"
                                data-src="/img/photos-21-min.jpg"
                                data-alt="Kazanraku">
                            </li>
                            <li class="photos-container__img"
                                data-src="/img/photos-22-min.jpg"
                                data-alt="San Cristbal">
                            </li>
                            <li class="photos-container__img"
                                data-src="/img/photos-23-min.jpg"
                                data-alt="Sahara">
                            </li>
                            <li class="photos-container__img"
                                data-src="/img/photos-24-min.jpg"
                                data-alt="Machu Pichu">
                            </li>
                        </ul>
                    </div>
                </div>
                <section id="works">
                    <div class="works-wrapper">
                        <h2 class="section-heading">Works</h2>
                        <ul class="works-container">
                            <li class="works-container__item">
                                <div class="works-container__date">
                                    2018年11⽉
                                </div>
                                <div class="works-container__description">
                                    <h3 class="works-container__heading">
                                        <span
                                            href="http://image-net.org/challenges/LSVRC/2012/results.html"
                                        >
                                            This Page - H. Muraoka's Portfolio Page
                                        </span>
                                    </h3>
                                    <p class="works-container__paragraph">
                                        ポートフォリオサイト。<br>
                                        勉強のためにフォントとアイコン以外の外部ファイル依存なしのフルスクラッチで実装。<br>
                                        使用言語はPHP7+SCSS+ES5。フロントサーバにnginx、アップストリームにApacheを利用してRaspberry PI上で運用中。
                                    </p>
                                </div>
                            </li>
                            <li class="works-container__item">
                                <div class="works-container__date">
                                    2018年12⽉
                                </div>
                                <div class="works-container__description">
                                    <h3 class="works-container__heading">
                                        <a
                                            href="https://gxxgle.kgjoi.com/search?term=qiita"
                                        >
                                            Gxxgle - Search Engine
                                        </a>
                                    </h3>
                                    <p class="works-container__paragraph">
                                        勉強のために作ったどこかで見たような検索サイト。<br>
                                        フロントエンドにHTML5+SCSS+ES5、バックエンドにGo(Revel)+PostgreSQLを利用。<br>
                                        ホームページと同じRaspberry PI上で運用中(停止予定)。
                                    </p>
                                </div>
                            </li>
                            <li class="works-container__item">
                                <div class="works-container__date">
                                    2018年12⽉
                                </div>
                                <div class="works-container__description">
                                    <h3 class="works-container__heading">
                                        <a
                                            href="https://tapitube.kgjoi.com"
                                        >
                                            Tapitube - Online Video Sharing Service
                                        </a>
                                    </h3>
                                    <p class="works-container__paragraph">
                                        勉強のために作ったどこかで見た動画共有サイト。<br>
                                        フロントエンドにHTML5+SCSS+jQuery(npm+webpack)、バックエンドにGo(Revel)+PostgreSQLを利用。<br>
                                        暫定的にホームページと同じRaspberry PI上で運用中(リソース枯渇につき、動画のアップロードは停止中)。
                                    </p>
                                </div>
                            </li>
                            <li class="works-container__item">
                                <div class="works-container__date">
                                    2019年1⽉
                                </div>
                                <div class="works-container__description">
                                    <h3 class="works-container__heading">
                                        <a
                                            href="https://blog.kgjoi.com"
                                        >
                                            Blog - H. Muraoka's Blog
                                        </a>
                                    </h3>
                                    <p class="works-container__paragraph">
                                        Gatsby(React)を利用したブログ。インフラはNetlifyに丸投げ。<br>
                                        既存のCSSフレームワークを上書きしているので、気が向いたら直したい。
                                    </p>
                                </div>
                            </li>
                            <li class="works-container__item">
                                <div class="works-container__date">
                                    2019年2⽉
                                </div>
                                <div class="works-container__description">
                                    <h3 class="works-container__heading">
                                        <a
                                            href="https://engel.kgjoi.com"
                                        >
                                            Engel - Household Account Sharing App
                                        </a>
                                    </h3>
                                    <p class="works-container__paragraph">
                                    共同生活者向けの家計共有アプリ。<br>
                                    フロントエンドにTypeScript+React+Redux+antd(UIフレームワーク)、バックエンドにGo(Gin)+PostgresSQLを利用。<br>
                                    現在鋭意開発中。モバイル対応後にリリース予定。
                                    </p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
            </main>
            <div class="modal">
                <div class="modal__outer">
                    <div class="modal__inner">
                        <div class="modal__state modal__state--before">
                            <ul class="modal-container">
                                <li class="modal-container__item">
                                    <h4 class="modal-container__subject">Name</h4>
                                    <p class="modal-container__value modal-container__value--name"></p>
                                </li>
                                <li class="modal-container__item">
                                    <h4 class="modal-container__subject">Email</h4>
                                    <p class="modal-container__value modal-container__value--email"></p>
                                </li>
                                <li class="modal-container__item">
                                    <h4 class="modal-container__subject">Message</h4>
                                    <p class="modal-container__value modal-container__value--message"></p>
                                </li>
                            </ul>
                            <div class="modal__btn-box">
                                <button class="modal__btn--submit btn btn--colored">Submit</button>
                                <button class="modal__btn--cancel btn btn--white">Cancel</button>
                            </div>
                            <p class="modal__confirmation">OK to submit?</p>
                        </div>
                        <div class="modal__state modal__state--after">
                            <div class="spinner">
                                <div class="spinner__outer">
                                    <div class="spinner__draw"></div>
                                </div>
                                <div class="spinner__message"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer id="footer">
                <div class="footer-wrapper">
                    <div class="footer-container">
                        <div class="footer-container__message">
                            <div class="message-container">
                                <h3 class="footer-heading">
                                    Thank you for visiting my page !!!
                                </h3>
                                <p class="message-container__paragraph">
                                継続して自ら学習できることが一番の強みであり、様々な分野の技術・知識を身に着けてきました。
                                実務でのWebアプリケーション開発経験はありませんが、プログラミング経験がありアルゴリズム等に関する知識があるため、エンジニアとしての基礎体力があります。
                                一戦力として素早くキャッチアップし、貴社の益々の発展に寄与できるよう努めてまいりますのでご検討のほどよろしくお願いいたします。
                                </p>
                            </div>
                            <div class="socials-container">
                                <h3 class="footer-heading">
                                    Find me on ...
                                </h3>
                                <div class="socials-container__icons">
                                    <ul class="social-links">
                                        <li class="social-links__item">
                                            <a class="social-links__link social-links__link--github" href="https://github.com/company1101">
                                                <i class="icon ion-logo-github"></i>
                                            </a>
                                        </li>
                                        <li class="social-links__item">
                                            <a class="social-links__link social-links__link--bucket" href="https://bitbucket.org/company1101/">
                                                <i class="icon ion-logo-bitbucket"></i>
                                            </a>
                                        </li>
                                        <li class="social-links__item">
                                            <a class="social-links__link social-links__link--kaggle" href="https://www.kaggle.com/pseprop">
                                                <svg role="img" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><title>Kaggle icon</title><path d="M18.825 23.859c-.022.092-.117.141-.281.141h-3.139c-.187 0-.351-.082-.492-.248l-5.178-6.589-1.448 1.374v5.111c0 .235-.117.352-.351.352H5.505c-.236 0-.354-.117-.354-.352V.353c0-.233.118-.353.354-.353h2.431c.234 0 .351.12.351.353v14.343l6.203-6.272c.165-.165.33-.246.495-.246h3.239c.144 0 .236.06.285.18.046.149.034.255-.036.315l-6.555 6.344 6.836 8.507c.095.104.117.208.07.358"/></svg>
                                            </a>
                                        </li>
                                        <li class="social-links__item">
                                            <a class="social-links__link social-links__link--instagram" href="https://www.instagram.com/hhhmuraoooka/">
                                                <i class="icon ion-logo-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                <p class="socials-container__copy">
                                    &copy; 2018 www.kgjoi.com. All Rights Reverved.
                                </p>
                            </div>
                        </div>
                        <div class="footer-container__form">
                            <h3 class="footer-heading">
                            Contact
                            </h3>
                            <form
                                class="contact-form"
                                action="/mailto.php"
                                method="POST"
                            >
                                <input
                                    type="hidden"
                                    name="csrf_token"
                                    value="<?php echo $_SESSION['csrf_token'] ?>"
                                />
                                <div class="contact-form__inputs">
                                    <input
                                        class="contact-form__input"
                                        type="text"
                                        name="name"
                                        id="contact-name"
                                        placeholder="Name"
                                        required
                                    />
                                    <input
                                        class="contact-form__input"
                                        type="email"
                                        name="email"
                                        id="contact-email"
                                        placeholder="Email"
                                        required
                                    />
                                </div>
                                <div class="contact-form__textarea-box">
                                    <textarea
                                        class="contact-form__textarea"
                                        name="message"
                                        id="contact-message"
                                        placeholder="Message"
                                        required
                                    ></textarea>
                                </div>
                                <button class="btn" type="submit">
                                    Confirm
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
        <script src="/js/script.js"></script>
    </body>
</html>

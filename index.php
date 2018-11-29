
<html lang="ja">
    <?php
session_start();
?>
    <head>
        <!-- meta -->
        <title>Hiroshi Muraoka</title>

        <meta name="description" content="H. Muraoka's Portfolio Site" />
        <meta name="keywords" content="golang, javascript, python, AI, web" />
        <meta name="viewport" content="width=device-width,initial-scale=1" />
        <!-- favicon -->
        <link rel="apple-touch-icon" sizes="180x180" href="/img/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon/favicon-16x16.png">
        <link rel="manifest" href="/img/favicon/site.webmanifest">
        <link rel="mask-icon" href="/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
        <link rel="shortcut icon" href="/img/favicon/favicon.ico">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="msapplication-config" content="/img/favicon/browserconfig.xml">
        <meta name="theme-color" content="#ffffff">
        <!-- style -->
        <link
            href="https://fonts.googleapis.com/css?family=Noto+Sans+JP|Roboto+Condensed:300,400,700"
            rel="stylesheet"
        />
        <link href="https://unpkg.com/ionicons@4.4.8/dist/css/ionicons.min.css" rel="stylesheet">
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.8/tiny-slider.css"
        />
        <link rel="stylesheet" href="./css/style.css" />
    </head>

    <body>
        <header id="header">
            <div class="header-wrapper">
                <nav class="navbar-box">
                    <ul class="navbar">
                        <li class="navbar__item"><a href="#about">About</a></li>
                        <li class="navbar__item">
                            <a href="#skills">Skills</a>
                        </li>
                        <li class="navbar__item">
                            <a href="#awards">Awards</a>
                        </li>
                        <li class="navbar__item"><a href="#works">Works</a></li>
                        <li class="navbar__item">
                            <a href="#footer">Contact</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </header>
        <div><a class="square-arrow-up go-to-top" href="#hero"></a></div>
        <main>
            <section id="hero">
                <div class="hero-wrapper">
                    <!-- background-image in CSS -->
                    <div class="hero-container">
                        <h1 class="hero-container__heading">Hiroshi Muraoka</h1>
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
                        <div class="about-container__contents">
                            <h3 class="about-container__heading">
                                村岡 宏是<span>Hiroshi Muraoka</span>
                            </h3>
                            <div class="about-container__paragraph">
                                <p>
                                    1988年生まれ。山形出身。滋賀県在住。<br>
                                    大学院修了後に国内証券会社のリサーチ部門に勤務し、3年後に退職して1年間の世界一周に出発。
                                    帰国後はKaggleに参加しながら、ウェブ関連の技術を幅広く独学し、現在に至る。<br>
                                    Deep
                                    Learning等の機械学習モデルの構築(PyTorch/Keras/scikit-learn+pandas/numpy)、
                                    レスポンシブな静的ページ作成(HTML5+CSS3+jQuery)、
                                    フルスタックフレームワークを利用したウェブサービスの作成(Revel)、
                                    REST APIの作成(Gin/Node.js)など。
                                </p>
                                <p>趣味は旅行とワインと動物。</p>
                            </div>
                        </div>
                        <div class="about-container__img-box">
                            <div class="about-container__img">
                                <!-- background-image in CSS -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section id="skills">
                <div class="skills-wrapper">
                    <h2 class="section-heading section-heading--white">
                        Skills
                    </h2>
                    <ul class="slider">
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    Python
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--python">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            Excelでは困難な規模のデータ集計・加工やスクレイピングによるデータ収集、統計分析に利用。<br>
                                            また、Deep LearningやBoosting等の機械学習モデルをKaggle上位10%相当の性能で安定して構築。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                        <h4 class="card__subheading">キーワード</h4>
                                        <p class="card__paragraph">
                                            機械学習: Keras/PyTorch/scikit-learn<br>
                                            データ処理: pandas/numpy/matplotlib
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                   JavaScript <span class="small-word">(front)</span>
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--javascript">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            HTML5+SCSSを用いたレスポンシブな静的サイトの構築。<br>
                                            jQuery/Vanilla JSを用いたMPA(Multiple Page Application)の構築。<br>
                                            React+ReduxによるSPA(Single Page Application)の構築の基礎知識。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                        <h4 class="card__subheading">キーワード</h4>
                                        <p class="card__paragraph">
                                            バージョン：ES5 / ES6 / TypeScript<br>
                                            View関連：JQuery / HTML5 / SCSS / React+Redux<br>
                                            開発ツール：npm / webpack / eslint / tslint / prettierx
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    Go
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--go">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            RailsベースのフルスタックフレームワークによるWebアプリケーションの構築。<br>
                                            パスワード認証、OAuth2認証を利用したREST APIの構築。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                        <h4 class="card__subheading">キーワード</h4>
                                        <p class="card__paragraph">
                                            フレームワーク：Revel / Gin<br>
                                            ORM：gorm
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    PostgresSQL
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--sql">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            CRUD、GROUP BY、JOIN、相関サブクエリ、トランザクション等、基本的なコマンドを利用可。<br>
                                            SQLのアルゴリズムの理解。個人利用以外での設計・経験はなし。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    Debian
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--debian">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            ls、grep、sed等、基本的なLinuxコマンドやGitによるバージョン管理を利用可。<br>
                                            自作PCにOS(Ubuntu)をインストールし、計算用サーバとして利用。<br>
                                            Raspberry PI上にnginx+Apacheをインストールし、Webサーバとして利用。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                        <h4 class="card__subheading">キーワード</h4>
                                        <p class="card__paragraph">
                                            各種ツール：Git / Vim / Screen / Bash / VSCode / nginx
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    Node.js
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--nodejs">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            MERN(MongoDB+Express+React+Node.js)スタックの学習時に利用。<br>
                                            OAuth認証を利用したREST APIの構築。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                        <h4 class="card__subheading">キーワード</h4>
                                        <p class="card__paragraph">
                                            Webフレームワーク：Express /passport2(OAuth2)<br>
                                            ORM： mongoose
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    C/C++
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--c">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            主に在学時に学習目的で利用した他、高速化のため他言語から呼び出す関数など小規模の開発に利用。
                                            基本的なアルゴリズムとデータ構造の実装。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                   Excel
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--excel">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            資料作成のための図表作成。
                                            外部ソースからのデータ取得から分析まで完結したツールを適宜VBAを駆使して構築可。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                   R
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--r">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            Excelでは困難な規模のデータ集計・加工や統計分析に利用。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                        <h4 class="card__subheading">キーワード</h4>
                                        <p class="card__paragraph">
                                            データ処理：dplyr / tidyr / ggplot2
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="slider__slide">
                            <div class="card">
                                <h3 class="card__heading">
                                    その他
                                </h3>
                                <div class="card__pie">
                                    <div class="pie pie--others">
                                        <div class="pie__right">
                                        </div>
                                        <div class="pie__left">
                                        </div>
                                        <div class="pie__center">
                                        </div>
                                    </div>
                                </div>
                                <div class="card__description">
                                    <div class="card__detail">
                                        <h4 class="card__subheading">概要</h4>
                                        <p class="card__paragraph">
                                            Webセキュリティ、マルチブラウザ対応、デザインに関して鋭意学習中。
                                        </p>
                                    </div>
                                    <div class="card__framework">
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </section>
            <section id="awards">
                <div class="awards-wrapper">
                    <h2 class="section-heading">Awards</h2>
                    <ul class="awards-container">
                        <li class="awards-container__item">
                            <div class="awards-container__date">2012年10⽉</div>
                            <div class="awards-container__description">
                                <h3 class="awards-container__heading">
                                    <a
                                        href="http://image-net.org/challenges/LSVRC/2012/results.html"
                                    >
                                        ImageNet Large Scale Visual Recognition
                                        Competition 2012 - Classification
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
                            <div class="awards-container__date">2016年5⽉</div>
                            <div class="awards-container__description">
                                <h3 class="awards-container__heading">
                                    <a
                                        href="https://www.kaggle.com/c/santander-customer-satisfaction"
                                    >
                                        Kaggle - Santander Customer Satisfaction
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
                            <div class="awards-container__date">2016年11⽉</div>
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
                            <div class="awards-container__date">2018年6⽉</div>
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
            <section id="photos">
                <div class="photos-container">
                    <ul class="photos-container__row">
                        <li class="photos-container__item">
                            <img src="/img/photos-11-min.jpg" alt="Victria Falls">
                        </li>
                        <li class="photos-container__item">
                            <img src="/img/photos-12-min.jpg" alt="Navagio">
                        </li>
                        <li class="photos-container__item">
                            <img src="/img/photos-13-min.jpg" alt="Sepilok">
                        </li>
                        <li class="photos-container__item">
                            <img src="/img/photos-14-min.jpg" alt="Kas">
                        </li>
                    </ul>
                    <ul class="photos-container__row">
                        <li class="photos-container__item">
                            <img src="/img/photos-21-min.jpg" alt="Chefchaouen">
                        </li>
                        <li class="photos-container__item">
                            <img src="/img/photos-22-min.jpg" alt="San Cristbal">
                        </li>
                        <li class="photos-container__item">
                            <img src="/img/photos-23-min.jpg" alt="Sahara">
                        </li>
                        <li class="photos-container__item">
                            <img src="/img/photos-24-min.jpg" alt="Machu Pichu">
                        </li>
                    </ul>
                </div>
            </section>
            <section id="works">
                <div class="works-wrapper">
                    <h2 class="section-heading">Works</h2>
                </div>
            </section>
        </main>
        <footer id="footer">
            <div class="footer-wrapper">
                <div class="footer-container">
                    <div class="footer-container__contents">
                        <h3 class="footer-container__heading">MESSAGE</h3>
                        <div class="footer-container__img-box">
                            <img src="/img/footer-min.jpg" alt="Puppy">
                        </div>
                        <div class="footer-container__pagraphs">
                            <p>
                                当ホームページをここまでご覧いただき、誠にありがとうございます。
                            </p>
                            <p>
                                現在、私は大阪北部～京都市内でWebエンジニアの職を探しております。
                            </p>
                            <p>
                                個人でRevel+jQuery/React+Reduxを利用して開発を行った経験があり、
                                様々な知識・技術を継続して学習する意欲があります。
                                そのため、業務での開発経験はありませんが、迅速に戦力としてキャッチアップできるのでは、と考えております。
                            </p>
                            <p>
                                なお、フロントエンド・バックエンド問わず、経験を積ませていただければ幸いですが、
                                どちらかというとフロントエンドに興味があります。
                            </p>
                            <p>ご検討のほど、何卒よろしくお願いいたします。</p>
                        </div>
                        <ul class="social-icons"></ul>
                    </div>
                    <div class="footer-container__form">
                        <form class="contact-form" action="mailto.php" method="POST">
                            <h3 class="footer-container__heading">Contact</h3>
                            <input type="hidden" name="mailform_token" value="
                                <?php
$token = sha1(uniqid(mt_rand(), true));
$_SESSION['mailform_token'] = $token;
echo $token;
?>
                            ">
                            <div class="contact-form__box">
                                <input
                                    class="contact-form__input"
                                    type="name"
                                    name="name"
                                    id="contact-name"
                                    placeholder="Name"
                                />
                            </div>
                            <div class="contact-form__box">
                                <input
                                    class="contact-form__input"
                                    type="email"
                                    name="email"
                                    id="contact-email"
                                    placeholder="Email"
                                />
                            </div>
                            <div class="contact-form__box">
                                <textarea
                                    class="contact-form__textarea"
                                    name="message"
                                    id="contact-message"
                                    placeholder="Message"
                                ></textarea>
                            </div>
                            <button class="btn btn--small" type="submit">
                                Send
                            </button>
                        </form>
                    </div>
                </div>
                <div class="footer-container__copy">
                    Copyrights &copy; 2018 www.kgjoi.com. All Rights Reverved.
                </div>
            </div>
        </footer>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.8.8/min/tiny-slider.js"></script>
        <script src="/js/script.js"></script>
    </body>
</html>

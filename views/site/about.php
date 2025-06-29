<?php
use yii\helpers\Html;
$this->title = 'О нас';
?>

<div class="site-about">
    <section class="hero-section py-5 bg-dark">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 animate-in">
                    <h1 class="display-4 fw-bold mb-4">О нашей <span class="gradient-text">студии</span></h1>
                    <p class="lead mb-4">Мы создаем пространство, где разработчики игр могут объединяться, творить и реализовывать свои самые смелые идеи.</p>

                    <div class="d-flex gap-3 mb-4">
                        <div class="text-center">
                            <div class="fs-1 fw-bold text-primary">2018</div>
                            <div class="text-muted">Основание</div>
                        </div>
                        <div class="text-center">
                            <div class="fs-1 fw-bold text-primary">500+</div>
                            <div class="text-muted">Проектов</div>
                        </div>
                        <div class="text-center">
                            <div class="fs-1 fw-bold text-primary">10K+</div>
                            <div class="text-muted">Разработчиков</div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 animate-in delay-1">
                    <div class="about-image glass-effect rounded-xl overflow-hidden">
                        <div class="p-5 text-center">
                            <div class="game-icon mx-auto float-animation">
                                <i class="bi bi-joystick"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="mission-section py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5 animate-in">
                <h2 class="fw-bold mb-3">Наша <span class="gradient-text">миссия</span></h2>
                <div class="divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-10 col-lg-8 animate-in delay-1">
                    <div class="card glass-effect">
                        <div class="card-body p-4 p-md-5">
                            <p class="fs-5 text-center mb-0">
                                "Мы стремимся создать самую поддерживающую экосистему для инди-разработчиков игр,
                                где каждый может найти ресурсы, команду и вдохновение для реализации своих творческих амбиций."
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="principles-section py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5 animate-in">
                <h2 class="fw-bold mb-3">Наши <span class="gradient-text">принципы</span></h2>
                <div class="divider"></div>
            </div>

            <div class="row g-4">
                <div class="col-md-4 animate-in delay-1">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4 text-center">
                            <div class="game-icon bg-info float-animation">
                                <i class="bi bi-people-fill"></i>
                            </div>
                            <h4 class="fw-bold mt-3">Сообщество</h4>
                            <p class="text-muted">Мы верим в силу сообщества и совместной работы над проектами</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 animate-in delay-2">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4 text-center">
                            <div class="game-icon bg-success float-animation">
                                <i class="bi bi-lightbulb"></i>
                            </div>
                            <h4 class="fw-bold mt-3">Инновации</h4>
                            <p class="text-muted">Поощряем эксперименты и нестандартные подходы в разработке</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4 animate-in delay-3">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4 text-center">
                            <div class="game-icon bg-warning float-animation">
                                <i class="bi bi-share"></i>
                            </div>
                            <h4 class="fw-bold mt-3">Открытость</h4>
                            <p class="text-muted">Делимся знаниями и опытом для роста каждого участника</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="team-section py-5 bg-dark">
        <div class="container">
            <div class="text-center mb-5 animate-in">
                <h2 class="fw-bold mb-3">Основатели <span class="gradient-text">студии</span></h2>
                <div class="divider"></div>
            </div>

            <div class="row g-4 justify-content-center">
                <div class="col-md-6 col-lg-4 animate-in delay-1">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4 text-center">
                            <div class="mx-auto mb-4">
                                <div class="game-icon float-animation">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-2">Алексей Петров</h4>
                            <p class="text-primary mb-2">Главный разработчик</p>
                            <p class="text-muted">Более 10 лет опыта в игровой индустрии, работал над AAA проектами</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-4 animate-in delay-2">
                    <div class="card glass-effect h-100 hover-grow">
                        <div class="card-body p-4 text-center">
                            <div class="mx-auto mb-4">
                                <div class="game-icon float-animation">
                                    <i class="bi bi-person-circle"></i>
                                </div>
                            </div>
                            <h4 class="fw-bold mb-2">Мария Иванова</h4>
                            <p class="text-primary mb-2">Креативный директор</p>
                            <p class="text-muted">Художник и дизайнер с уникальным видением игровых миров</p>
                        </div>
                    </div>
           
<?php
use yii\helpers\Html;
use yii\helpers\Url;
$this->title = 'Главная';
?>

<div class="site-index">
    <!-- Герой-секция с 3D эффектами -->
    <section class="hero-section py-5 position-relative overflow-hidden">
        <!-- 3D Particles Container -->
        <canvas id="particles-3d" class="particles-3d"></canvas>
        <canvas id="nebula-3d" class="nebula-3d"></canvas>

        <!-- Анимированный фон -->
        <div class="animated-bg">
            <div class="stars stars-1"></div>
            <div class="stars stars-2"></div>
            <div class="twinkling"></div>
        </div>

        <div class="container position-relative z-index-10">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0 animate-in">
                    <h1 class="display-3 fw-bold mb-4">
                        <span class="neon-text flicker">Добро пожаловать в</span>
                        <span class="neon-text gradient-text typing-effect">GameDev Universe!</span>
                    </h1>

                    <p class="lead mb-4 text-light">Космическое сообщество для инди-разработчиков игр. Объединяем таланты, создаем шедевры.</p>

                    <div class="d-flex flex-wrap gap-3">
                        <?= Html::a('Исследовать проекты', ['project/index'], [
                            'class' => 'btn btn-primary btn-lg px-4 py-3 hover-glow magnetic ripple-effect'
                        ]) ?>

                        <?= Html::a('Присоединиться к команде', ['team/index'], [
                            'class' => 'btn btn-outline-light btn-lg px-4 py-3 hover-glow magnetic ripple-effect'
                        ]) ?>
                    </div>

                    <div class="mt-5 d-flex align-items-center">
                        <div class="avatar-group me-3">
                            <div class="avatar avatar-sm pulse-anim" style="background: linear-gradient(45deg, #ff00cc, #3333ff);"></div>
                            <div class="avatar avatar-sm float-anim delay-1" style="background: linear-gradient(45deg, #00dbde, #fc00ff);"></div>
                            <div class="avatar avatar-sm pulse-anim delay-2" style="background: linear-gradient(45deg, #f6d365, #fda085);"></div>
                        </div>
                        <div class="text-muted">Более <span class="text-white fw-bold counter" data-count="2500">0</span> разработчиков уже с нами</div>
                    </div>
                </div>

                <div class="col-lg-6 animate-in delay-1">
                    <div class="hero-image glass-effect rounded-xl overflow-hidden position-relative hover-3d">
                        <div class="position-absolute top-0 end-0 m-4">
                            <span class="badge bg-primary fs-6 p-3 glass-effect hover-pulse floating-label">Новые проекты</span>
                        </div>
                        <div class="p-5 text-center">
                            <!-- 3D игровой мир -->
                            <div id="game-world-3d" class="game-world-container"></div>
                            <h3 class="fw-bold mt-4 text-white">Создавай игровые вселенные</h3>
                            <p class="mb-0 text-light">Присоединяйся к крупнейшему сообществу инди-разработчиков</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Секция последних проектов -->
    <section class="projects-section py-5 position-relative">
        <div class="animated-bg">
            <div class="nebula"></div>
            <div class="stars"></div>
        </div>

        <div class="container position-relative z-index-10">
            <div class="d-flex justify-content-between align-items-center mb-5">
                <div class="animate-in">
                    <h2 class="fw-bold display-4">
                        <span class="text-stroke">Галактика</span>
                        <span class="gradient-text">проектов</span>
                    </h2>
                    <p class="text-light">Самые свежие работы нашего сообщества</p>
                </div>
                <div class="animate-in delay-1">
                    <?= Html::a('Все проекты', ['project/index'], [
                        'class' => 'btn btn-outline-light hover-glow magnetic'
                    ]) ?>
                </div>
            </div>

            <div class="row g-4">
                <!-- Пример проекта 1 -->
                <div class="col-md-4 animate-in">
                    <div class="project-card-3d">
                        <div class="project-card glass-effect rounded-lg overflow-hidden h-100">
                            <div class="project-image" style="background: linear-gradient(135deg, #6e8efb, #a777e3); height: 200px; position: relative;">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-success glass-effect">Новый</span>
                                </div>
                                <div class="project-3d-icon">🚀</div>
                            </div>
                            <div class="p-4">
                                <h4 class="fw-bold text-white">Космические приключения</h4>
                                <p class="text-light mb-3">Исследуйте галактику в этой захватывающей RPG</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar-group">
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #ff00cc, #3333ff);"></div>
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #00dbde, #fc00ff);"></div>
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #f6d365, #fda085);"></div>
                                    </div>
                                    <?= Html::a('Подробнее', '#', [
                                        'class' => 'btn btn-sm btn-outline-light hover-glow'
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Пример проекта 2 -->
                <div class="col-md-4 animate-in delay-1">
                    <div class="project-card-3d">
                        <div class="project-card glass-effect rounded-lg overflow-hidden h-100">
                            <div class="project-image" style="background: linear-gradient(135deg, #f54ea2, #ff7676); height: 200px; position: relative;">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-primary glass-effect">Популярный</span>
                                </div>
                                <div class="project-3d-icon">🐉</div>
                            </div>
                            <div class="p-4">
                                <h4 class="fw-bold text-white">Подземелья и драконы</h4>
                                <p class="text-light mb-3">Классическая RPG с современной графикой</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar-group">
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #00dbde, #fc00ff);"></div>
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #f6d365, #fda085);"></div>
                                    </div>
                                    <?= Html::a('Подробнее', '#', [
                                        'class' => 'btn btn-sm btn-outline-light hover-glow'
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Пример проекта 3 -->
                <div class="col-md-4 animate-in delay-2">
                    <div class="project-card-3d">
                        <div class="project-card glass-effect rounded-lg overflow-hidden h-100">
                            <div class="project-image" style="background: linear-gradient(135deg, #17ead9, #6078ea); height: 200px; position: relative;">
                                <div class="position-absolute top-0 end-0 m-3">
                                    <span class="badge bg-warning glass-effect">В разработке</span>
                                </div>
                                <div class="project-3d-icon">🏎️</div>
                            </div>
                            <div class="p-4">
                                <h4 class="fw-bold text-white">Гонки на выживание</h4>
                                <p class="text-light mb-3">Экстремальные гонки с элементами выживания</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="avatar-group">
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #ff00cc, #3333ff);"></div>
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #00dbde, #fc00ff);"></div>
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #f6d365, #fda085);"></div>
                                        <div class="avatar avatar-xs" style="background: linear-gradient(45deg, #5ee7df, #b490ca);"></div>
                                    </div>
                                    <?= Html::a('Подробнее', '#', [
                                        'class' => 'btn btn-sm btn-outline-light hover-glow'
                                    ]) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Секция технологий -->
    <section class="tech-section py-5 position-relative">
        <div class="animated-bg">
            <div class="nebula"></div>
            <div class="stars"></div>
        </div>

        <div class="container position-relative z-index-10">
            <div class="text-center mb-5">
                <h2 class="fw-bold display-4">
                    <span class="text-stroke">Наши</span>
                    <span class="gradient-text">технологии</span>
                </h2>
                <p class="text-light">Инструменты, которые помогут создать вашу вселенную</p>
            </div>

            <div class="row g-5">
                <div class="col-md-3 col-6 text-center animate-in">
                    <div class="tech-icon-3d">
                        <div class="tech-icon-inner">
                            <span class="tech-icon">🕹️</span>
                        </div>
                        <h5 class="mt-3 text-white">Game Engines</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 text-center animate-in delay-1">
                    <div class="tech-icon-3d">
                        <div class="tech-icon-inner">
                            <span class="tech-icon">🎨</span>
                        </div>
                        <h5 class="mt-3 text-white">3D Modeling</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 text-center animate-in delay-2">
                    <div class="tech-icon-3d">
                        <div class="tech-icon-inner">
                            <span class="tech-icon">💻</span>
                        </div>
                        <h5 class="mt-3 text-white">VR/AR</h5>
                    </div>
                </div>
                <div class="col-md-3 col-6 text-center animate-in delay-3">
                    <div class="tech-icon-3d">
                        <div class="tech-icon-inner">
                            <span class="tech-icon">🌌</span>
                        </div>
                        <h5 class="mt-3 text-white">Cloud Gaming</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA секция -->
    <section class="cta-section py-5 position-relative overflow-hidden">
        <canvas id="cta-particles" class="particles-3d"></canvas>

        <div class="animated-bg">
            <div class="nebula"></div>
            <div class="stars"></div>
        </div>

        <div class="container position-relative z-index-10">
            <div class="row justify-content-center">
                <div class="col-lg-8 text-center animate-in">
                    <h2 class="fw-bold mb-4 display-4">Начни свою игровую вселенную сегодня!</h2>
                    <p class="lead mb-5">Присоединяйся к тысячам разработчиков, которые уже создают свои миры</p>

                    <div class="d-flex justify-content-center gap-3">
                        <?= Html::a('Создать проект', ['project/create'], [
                            'class' => 'btn btn-light btn-lg px-4 py-3 hover-glow magnetic ripple-effect'
                        ]) ?>

                        <?= Html::a('Узнать больше', ['site/about'], [
                            'class' => 'btn btn-outline-light btn-lg px-4 py-3 hover-glow magnetic ripple-effect'
                        ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
    body {
        background: radial-gradient(ellipse at center, #0f0c29 0%, #1a152e 40%, #0a081d 100%);
        color: #e2e8f0;
        font-family: 'Segoe UI', system-ui, sans-serif;
        overflow-x: hidden;
        perspective: 1000px;
    }

    .neon-text {
        text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #00dbde, 0 0 20px #00dbde, 0 0 25px #00dbde;
        animation: neon-glow 1.5s ease-in-out infinite alternate;
    }

    .flicker {
        animation: flicker 3s infinite alternate;
    }

    @keyframes neon-glow {
        from {
            text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px #00dbde, 0 0 20px #00dbde, 0 0 25px #00dbde;
        }
        to {
            text-shadow: 0 0 10px #fff, 0 0 20px #fff, 0 0 30px #fc00ff, 0 0 40px #fc00ff, 0 0 50px #fc00ff;
        }
    }

    @keyframes flicker {
        0%, 19%, 21%, 23%, 25%, 54%, 56%, 100% {
            opacity: 1;
        }
        20%, 24%, 55% {
            opacity: 0.6;
        }
    }

    .glass-effect {
        background: rgba(255, 255, 255, 0.08);
        backdrop-filter: blur(12px);
        border: 1px solid rgba(255, 255, 255, 0.15);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.25);
        border-radius: 12px;
    }

    .hover-3d {
        transition: transform 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275), box-shadow 0.4s ease;
    }

    .hover-3d:hover {
        transform: translateY(-10px) rotateX(8deg) rotateY(5deg) scale(1.02);
        box-shadow: 0 25px 50px rgba(0, 0, 0, 0.4);
    }

    .project-card {
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        transform-style: preserve-3d;
    }

    .project-card:hover {
        transform: translateY(-12px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.5);
    }

    .project-card-3d {
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .project-3d-icon {
        font-size: 4rem;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%) translateZ(20px);
        opacity: 0.7;
        animation: float-icon 6s ease-in-out infinite;
    }

    @keyframes float-icon {
        0%, 100% { transform: translate(-50%, -50%) translateZ(20px) rotateY(0deg); }
        25% { transform: translate(-50%, -55%) translateZ(30px) rotateY(90deg); }
        50% { transform: translate(-50%, -50%) translateZ(20px) rotateY(180deg); }
        75% { transform: translate(-50%, -45%) translateZ(30px) rotateY(270deg); }
    }

    .avatar {
        display: inline-block;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        background: linear-gradient(45deg, #00dbde, #fc00ff);
        margin-right: -8px;
        border: 2px solid #0f0c29;
        box-shadow: 0 0 10px rgba(0, 219, 222, 0.5);
    }

    .avatar-xs {
        width: 24px;
        height: 24px;
    }

    .pulse-anim {
        animation: pulse 2s infinite;
    }

    .float-anim {
        animation: float 3s ease-in-out infinite;
    }

    .delay-1 { animation-delay: 0.2s; }
    .delay-2 { animation-delay: 0.4s; }
    .delay-3 { animation-delay: 0.6s; }

    @keyframes pulse {
        0% { transform: scale(1); }
        50% { transform: scale(1.15); }
        100% { transform: scale(1); }
    }

    @keyframes float {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-12px); }
    }

    .floating-label {
        animation: float-label 3s ease-in-out infinite;
    }

    @keyframes float-label {
        0%, 100% { transform: translateY(0) rotate(3deg); }
        50% { transform: translateY(-12px) rotate(-3deg); }
    }

    .hover-glow {
        transition: all 0.3s ease;
    }

    .hover-glow:hover {
        box-shadow: 0 0 20px rgba(138, 43, 226, 0.8);
        transform: scale(1.05);
    }

    /* Анимация появления */
    .animate-in {
        opacity: 0;
        transform: translateY(40px);
        transition: opacity 0.8s ease, transform 0.8s ease;
    }

    .animate-in.animate-in {
        opacity: 1;
        transform: translateY(0);
    }

    .tech-icon-3d {
        perspective: 1000px;
        transform-style: preserve-3d;
    }

    .tech-icon-inner {
        width: 120px;
        height: 120px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: center;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        border-radius: 50%;
        border: 1px solid rgba(255, 255, 255, 0.2);
        transform: rotateX(0deg) rotateY(0deg);
        transition: transform 0.6s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
    }

    .tech-icon-3d:hover .tech-icon-inner {
        transform: rotateX(20deg) rotateY(20deg) translateZ(30px);
    }

    .tech-icon {
        font-size: 3.5rem;
        transform: translateZ(40px);
    }

    /* Адаптивность */
    @media (max-width: 768px) {
        .display-4 {
            font-size: 2.5rem;
        }

        .tech-icon-inner {
            width: 80px;
            height: 80px;
        }

        .tech-icon {
            font-size: 2.5rem;
        }
    }
</style>

<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    // Инициализация 3D частиц
    function initParticles(canvasId, config = {}) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) return;

        // Установка размеров canvas
        canvas.width = canvas.offsetWidth;
        canvas.height = canvas.offsetHeight;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, canvas.width / canvas.height, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({
            canvas,
            alpha: true,
            antialias: true
        });
        renderer.setSize(canvas.width, canvas.height);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));

        // Настройки частиц
        const particlesCount = config.particlesCount || 2000;
        const particleSize = config.particleSize || 0.15;
        const movementSpeed = config.movementSpeed || 0.01;
        const rotationSpeed = config.rotationSpeed || 0.001;

        // Создание геометрии частиц
        const particlesGeometry = new THREE.BufferGeometry();
        const posArray = new Float32Array(particlesCount * 3);
        const colorArray = new Float32Array(particlesCount * 3);
        const sizeArray = new Float32Array(particlesCount);

        for (let i = 0; i < particlesCount * 3; i += 3) {
            posArray[i] = (Math.random() - 0.5) * 50;
            posArray[i + 1] = (Math.random() - 0.5) * 50;
            posArray[i + 2] = (Math.random() - 0.5) * 50;

            // Генерация цвета в сине-фиолетовой гамме
            colorArray[i] = Math.random() * 0.5 + 0.2;
            colorArray[i + 1] = Math.random() * 0.3;
            colorArray[i + 2] = Math.random() * 0.5 + 0.5;

            sizeArray[i/3] = Math.random() * particleSize + particleSize * 0.5;
        }

        particlesGeometry.setAttribute('position', new THREE.BufferAttribute(posArray, 3));
        particlesGeometry.setAttribute('color', new THREE.BufferAttribute(colorArray, 3));
        particlesGeometry.setAttribute('size', new THREE.BufferAttribute(sizeArray, 1));

        // Материал частиц
        const particlesMaterial = new THREE.PointsMaterial({
            size: particleSize,
            vertexColors: true,
            transparent: true,
            opacity: 0.8,
            depthWrite: false,
            blending: THREE.AdditiveBlending,
            sizeAttenuation: true
        });

        const particlesMesh = new THREE.Points(particlesGeometry, particlesMaterial);
        scene.add(particlesMesh);

        // Туман
        scene.fog = new THREE.FogExp2(0x0a081d, 0.015);

        // Позиция камеры
        camera.position.z = 20;

        // Интерактивность
        const mouse = { x: 0, y: 0 };
        window.addEventListener('mousemove', (e) => {
            mouse.x = (e.clientX / window.innerWidth) * 2 - 1;
            mouse.y = -(e.clientY / window.innerHeight) * 2 + 1;
        });

        // Анимация
        const clock = new THREE.Clock();

        function animate() {
            requestAnimationFrame(animate);

            const elapsedTime = clock.getElapsedTime();
            const deltaTime = clock.getDelta();

            // Вращение частиц
            particlesMesh.rotation.x = elapsedTime * rotationSpeed;
            particlesMesh.rotation.y = elapsedTime * rotationSpeed * 0.7;

            // Движение частиц
            const positions = particlesGeometry.attributes.position.array;
            for (let i = 0; i < particlesCount * 3; i += 3) {
                // Эффект волны
                positions[i + 1] += Math.sin(elapsedTime + i) * movementSpeed * 0.3;

                // Воздействие мыши
                if (Math.abs(mouse.x) > 0.1 || Math.abs(mouse.y) > 0.1) {
                    const dx = positions[i] - mouse.x * 20;
                    const dy = positions[i + 1] - mouse.y * 20;
                    const distance = Math.sqrt(dx * dx + dy * dy);

                    if (distance < 10) {
                        const force = (10 - distance) * 0.01;
                        positions[i] += dx * force * deltaTime * 30;
                        positions[i + 1] += dy * force * deltaTime * 30;
                    }
                }

                // Возвращение на место
                const origX = (i % 30) * 1.7 - 25;
                const origY = ((i / 3) % 30) * 1.7 - 25;
                positions[i] += (origX - positions[i]) * 0.01;
                positions[i + 1] += (origY - positions[i + 1]) * 0.01;
            }
            particlesGeometry.attributes.position.needsUpdate = true;

            // Движение камеры
            camera.position.x += (mouse.x * 5 - camera.position.x) * 0.05;
            camera.position.y += (mouse.y * 5 - camera.position.y) * 0.05;
            camera.lookAt(scene.position);

            renderer.render(scene, camera);
        }

        animate();

        // Реакция на изменение размеров окна
        window.addEventListener('resize', () => {
            canvas.width = canvas.offsetWidth;
            canvas.height = canvas.offsetHeight;

            camera.aspect = canvas.width / canvas.height;
            camera.updateProjectionMatrix();
            renderer.setSize(canvas.width, canvas.height);
        });
    }

    // Создание 3D игрового мира
    function initGameWorld() {
        const container = document.getElementById('game-world-3d');
        if (!container) return;

        // Создание сцены
        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.offsetWidth / container.offsetHeight, 0.1, 1000);

        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        renderer.setSize(container.offsetWidth, container.offsetHeight);
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        container.appendChild(renderer.domElement);

        // Освещение
        const ambientLight = new THREE.AmbientLight(0x404040);
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(1, 1, 1);
        scene.add(directionalLight);

        // Планета
        const planetGeometry = new THREE.SphereGeometry(1.8, 64, 64);
        const planetMaterial = new THREE.MeshPhongMaterial({
            color: 0x3498db,
            shininess: 80,
            emissive: 0x072534,
            specular: 0xffffff
        });
        const planet = new THREE.Mesh(planetGeometry, planetMaterial);
        scene.add(planet);

        // Облака
        const cloudsGeometry = new THREE.SphereGeometry(1.85, 64, 64);
        const cloudsMaterial = new THREE.MeshPhongMaterial({
            color: 0xffffff,
            transparent: true,
            opacity: 0.3,
            shininess: 10
        });
        const clouds = new THREE.Mesh(cloudsGeometry, cloudsMaterial);
        scene.add(clouds);

        // Кольца
        const ringGeometry = new THREE.RingGeometry(2.2, 3.0, 64);
        const ringMaterial = new THREE.MeshPhongMaterial({
            color: 0x9b59b6,
            side: THREE.DoubleSide,
            transparent: true,
            opacity: 0.7
        });
        const ring = new THREE.Mesh(ringGeometry, ringMaterial);
        ring.rotation.x = Math.PI / 3;
        scene.add(ring);

        // Звезды
        const starsGeometry = new THREE.BufferGeometry();
        const starsCount = 1000;
        const starsPositions = new Float32Array(starsCount * 3);

        for (let i = 0; i < starsCount * 3; i += 3) {
            starsPositions[i] = (Math.random() - 0.5) * 20;
            starsPositions[i + 1] = (Math.random() - 0.5) * 20;
            starsPositions[i + 2] = (Math.random() - 0.5) * 20;
        }

        starsGeometry.setAttribute('position', new THREE.BufferAttribute(starsPositions, 3));
        const starsMaterial = new THREE.PointsMaterial({
            color: 0xffffff,
            size: 0.05,
            sizeAttenuation: true
        });

        const stars = new THREE.Points(starsGeometry, starsMaterial);
        scene.add(stars);

        // Позиция камеры
        camera.position.z = 5;

        // Анимация
        function animate() {
            requestAnimationFrame(animate);

            planet.rotation.y += 0.003;
            clouds.rotation.y += 0.004;
            ring.rotation.z += 0.001;

            renderer.render(scene, camera);
        }

        animate();

        // Реакция на изменение размеров
        window.addEventListener('resize', () => {
            camera.aspect = container.offsetWidth / container.offsetHeight;
            camera.updateProjectionMatrix();
            renderer.setSize(container.offsetWidth, container.offsetHeight);
        });
    }

    // Анимация счетчиков
    function animateCounters() {
        const counters = document.querySelectorAll('.counter');
        const speed = 200;

        counters.forEach(counter => {
            const target = +counter.getAttribute('data-count');
            const count = +counter.innerText;
            const increment = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + increment);
                setTimeout(animateCounters, 1);
            } else {
                counter.innerText = target;
            }
        });
    }

    // Магнитные кнопки
    function initMagneticButtons() {
        const buttons = document.querySelectorAll('.magnetic');

        buttons.forEach(button => {
            button.addEventListener('mousemove', (e) => {
                const rect = button.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                const deltaX = (x - centerX) / centerX * 10;
                const deltaY = (y - centerY) / centerY * 10;

                button.style.transform = `translate(${deltaX}px, ${deltaY}px)`;
            });

            button.addEventListener('mouseleave', () => {
                button.style.transform = 'translate(0, 0)';
            });
        });
    }

    // Запуск всех эффектов при загрузке
    document.addEventListener('DOMContentLoaded', function() {
        // Инициализация частиц с разными настройками
        initParticles('particles-3d', {
            particlesCount: 3000,
            particleSize: 0.2,
            movementSpeed: 0.02
        });

        initParticles('cta-particles', {
            particlesCount: 1500,
            particleSize: 0.15,
            movementSpeed: 0.015
        });

        // Инициализация игрового мира
        initGameWorld();

        // Анимации
        setTimeout(animateCounters, 1000);
        initMagneticButtons();

        // Анимация при скролле
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-in');
                }
            });
        }, { threshold: 0.1 });

        document.querySelectorAll('.animate-in').forEach(el => {
            observer.observe(el);
        });
    });
</script>
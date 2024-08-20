<!-- 右下角按钮组 -->
<div class="icon-container is-hidden" id="btn-section">
    <svg id="btn-totop" t="1710072072094" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="1967" width="200" height="200">
        <path d="M481.834667 183.168a42.666667 42.666667 0 0 1 60.330666 0l256 256a42.666667 42.666667 0 1 1-60.330666 60.330667L512 273.664 286.165333 499.498667a42.666667 42.666667 0 1 1-60.330666-60.330667l256-256zM512 529.664L286.165333 755.498667a42.666667 42.666667 0 1 1-60.330666-60.330667l256-256a42.666667 42.666667 0 0 1 60.330666 0l256 256a42.666667 42.666667 0 1 1-60.330666 60.330667L512 529.664z" fill="#000000" p-id="1968"></path>
    </svg>
    <svg id="btn-dark" t="1710073893594" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2110" width="200" height="200">
        <path d="M399.381333 140.501333a42.666667 42.666667 0 0 1 7.957334 49.365334 316.330667 316.330667 0 0 0-33.792 142.741333c0 175.530667 142.293333 317.845333 317.845333 317.845333 51.413333 0 99.882667-12.181333 142.741333-33.792a42.666667 42.666667 0 0 1 57.301334 57.301334C825.173333 805.589333 688.768 896 531.157333 896 308.501333 896 128 715.498667 128 492.842667 128 335.232 218.432 198.826667 350.037333 132.544a42.666667 42.666667 0 0 1 49.344 7.936z m-108.330666 144.064A316.586667 316.586667 0 0 0 213.333333 492.842667C213.333333 668.373333 355.626667 810.666667 531.157333 810.666667a316.586667 316.586667 0 0 0 208.277334-77.717334c-15.765333 1.856-31.786667 2.837333-48.042667 2.837334-222.656 0-403.178667-180.522667-403.178667-403.178667 0-16.256 0.981333-32.277333 2.837334-48.042667z" fill="#000000" p-id="2111"></path>
    </svg>
    <svg id="btn-fullscreen" t="1710075560442" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2253" width="200" height="200">
        <path d="M256 316.330667V384a42.666667 42.666667 0 1 1-85.333333 0v-170.666667a42.666667 42.666667 0 0 1 42.666666-42.666666h170.666667a42.666667 42.666667 0 1 1 0 85.333333h-67.669333l97.834666 97.834667a42.666667 42.666667 0 1 1-60.330666 60.330666L256 316.330667zM640 256a42.666667 42.666667 0 1 1 0-85.333333h170.666667a42.666667 42.666667 0 0 1 42.666666 42.666666v170.666667a42.666667 42.666667 0 1 1-85.333333 0v-67.669333l-97.834667 97.834666a42.666667 42.666667 0 1 1-60.330666-60.330666L707.669333 256H640zM213.333333 597.333333a42.666667 42.666667 0 0 1 42.666667 42.666667v67.669333l97.834667-97.834666a42.666667 42.666667 0 1 1 60.330666 60.330666L316.330667 768H384a42.666667 42.666667 0 1 1 0 85.333333h-170.666667a42.666667 42.666667 0 0 1-42.666666-42.666666v-170.666667a42.666667 42.666667 0 0 1 42.666666-42.666667z m396.501334 72.832a42.666667 42.666667 0 1 1 60.330666-60.330666L768 707.669333V640a42.666667 42.666667 0 1 1 85.333333 0v170.666667a42.666667 42.666667 0 0 1-42.666666 42.666666h-170.666667a42.666667 42.666667 0 1 1 0-85.333333h67.669333l-97.834666-97.834667z" fill="#000000" p-id="2254"></path>
    </svg>
    <svg id="btn-profile" t="1710078428970" class="icon" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg" p-id="2539" width="200" height="200">
        <path d="M512 170.666667a170.666667 170.666667 0 1 0 0 341.333333 170.666667 170.666667 0 0 0 0-341.333333z m-256 170.666666c0-141.376 114.624-256 256-256s256 114.624 256 256-114.624 256-256 256-256-114.624-256-256z m85.333333 426.666667a128 128 0 0 0-128 128 42.666667 42.666667 0 1 1-85.333333 0c0-117.824 95.509333-213.333333 213.333333-213.333333h341.333334c117.824 0 213.333333 95.509333 213.333333 213.333333a42.666667 42.666667 0 1 1-85.333333 0 128 128 0 0 0-128-128H341.333333z" fill="#000000" p-id="2540"></path>
    </svg>
</div>



<div id="slider" class="modal">
    <div class="modal-background"></div>
    <div class="modal-content">
    <div class="card">
    <div class="card-content">
        <!-- 头像和个性签名 -->
        <div class="columns is-vcentered is-multiline">
            <div class="column is-one-quarter has-text-centered">
                <figure class="image is-128x128">
                    <img src="<?php $this->options->logoUrl() ?>" alt="头像">
                </figure>
            </div>
            <div class="column is-three-quarters">
                <p class="title">个性签名</p>
                <p class="content">这里是个性签名</p>
            </div>
        </div>
        <!-- 博客文章总数和评论总数 -->
        <div class="columns is-vcentered is-multiline">
            <div class="column is-half has-text-centered">
                <p class="heading">博客文章总数</p>
                <p class="title">100</p>
            </div>
            <div class="column is-half has-text-centered">
                <p class="heading">评论总数</p>
                <p class="title">50</p>
            </div>
        </div>
        <!-- 点赞按钮 -->
        <div class="columns is-vcentered is-multiline">
            <div class="column is-one-third has-text-centered">
                <button class="button is-danger">
                    <span class="icon">
                        <i class="fas fa-heart"></i>
                    </span>
                    <span>点赞</span>
                </button>
            </div>
        </div>
        <!-- 任务清单 -->
        <div class="columns is-vcentered is-multiline">
            <div class="column is-one-third">
                <div class="card">
                    <header class="card-header">
                        <p class="card-header-title">任务清单</p>
                    </header>
                    <div class="card-content">
                        <div class="content">
                            <ul>
                                <li>任务 1</li>
                                <li>任务 2</li>
                                <li>任务 3</li>
                                <!-- 其他任务 -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Functions to open and close a modal
        function openModal($el) {
            $el.classList.add('is-active');
        }

        function closeModal($el) {
            $el.classList.remove('is-active');
        }

        function closeAllModals() {
            (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                closeModal($modal);
            });
        }

        // Add a click event on buttons to open a specific modal
        (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
            const modal = $trigger.dataset.target;
            const $target = document.getElementById(modal);

            $trigger.addEventListener('click', () => {
                openModal($target);
            });
        });

        // Add a click event on various child elements to close the parent modal
        (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
            const $target = $close.closest('.modal');

            $close.addEventListener('click', () => {
                closeModal($target);
            });
        });

        // Add a keyboard event to close all modals
        document.addEventListener('keydown', (event) => {
            if (event.key === "Escape") {
                closeAllModals();
            }
        });
    });
</script>
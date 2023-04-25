
    <style>
        .nav.nav-pills {
            display: flex;
            flex-direction: column;
            display: block !important;
            width: 100% !important;
        }

        .nav.nav-pills button {
            width: 100%;
            display: block;
            border: none;
            outline: none;
        }

        .nav-pills .nav-link.active {
            background-color: black !important;
            color: white !important;
        }

        .card {
            border: 1px solid rgb(239, 233, 233) !important;
        }

        .card:hover {
            box-shadow: 0 1px 3px -4px rgb(0 0 0 / 12%), 0 1px 2px rgb(0 0 0 / 24%);

        }
    </style>
<div class="vungsanpham" ng-Controller="myctrl">
        <div class="container mt-5">
            <div class="row">
                <div class="col-3">
                    <!--  -->
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-home-tab" data-toggle="pill" data-target="#pills-home"
                                type="button" role="tab" aria-controls="pills-home" aria-selected="true">Home</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-toggle="pill" data-target="#pills-spgg"
                                type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Sản Phẩm
                                Giảm Giá</button>
                        </li>
                       
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-toggle="pill"
                                data-target="#pills-treem" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">Trẻ Em
                            </button>
                        </li>
                     
                    </ul>
                    <!--  -->
                </div>
                <div class="col-9">
                    <!--  -->
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                            aria-labelledby="pills-home-tab">
                            <!-- home -->
                            <div class="row">
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/h1-product-1-list-img.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Crimson</h4>
                                            <p class="card-text mb-4">
                                                100000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/h1-product-2-list-img-1.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Illusion</h4>
                                            <p class="card-text mb-4">
                                                200000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/left-product-5-list.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Only shore</h4>
                                            <p class="card-text mb-4">
                                                900000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/h1-product-1-list-img.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Fair Run</h4>
                                            <p class="card-text mb-4">
                                                300000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/h1-product-4-list-img-1.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Street Age</h4>
                                            <p class="card-text mb-4">
                                                400000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/h1-product-5-list-img-1.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Warrior</h4>
                                            <p class="card-text mb-4">
                                                500000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/h1-product-6-list-img.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Sn White</h4>
                                            <p class="card-text mb-4">
                                                600000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in home">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/left-product-4-list.png" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Snake</h4>
                                            <p class="card-text mb-4">
                                                700000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- home -->
                        </div>
                        <div class="tab-pane fade" id="pills-spgg" role="tabpanel" aria-labelledby="pills-profile-tab">
                            <!-- san pham giam gia -->
                            <div class="row">
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/balo-1.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">Jack Purcell Pro</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-2.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">One Star Pro OG Update</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-3.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star 70 Poplin Shirt</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-4.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">84 Thunderbolt Breathable Mesh</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-5.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Ox x Nike Flyknit Multi</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-6.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">Break Point Foundational Leather</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-7.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">Cons Auckland Ultra</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in sanphamgiamgia">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/sale-off-8.jpg" alt="">
                                        <span class=" title-khuyenmai">-30%</span>
                                        <div class="card-body">
                                            <h4 class="card-title">Cons PL 76 Foundational Leather</h4>
                                            <p class="card-text mb-4"><strike class="text-danger">1,500,000 đ</strike>
                                                1050000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- san pham giam gia -->
                        </div>
                       
                        <div class="tab-pane fade" id="pills-treem" role="tabpanel" aria-labelledby="pills-contact-tab">
                            <!-- treem-->
                            <div class="row">
                                <div class="col-3 mb-4" ng-repeat="sanpham in treem">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/kid-1-1-300x225.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Creatures Boston x London Transport</h4>
                                            <p class="card-text mb-4">
                                                800000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in treem">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/kid-2-300x225.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Simple Step Boston x London Transport</h4>
                                            <p class="card-text mb-4">
                                                900000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in treem">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/kid-3-1-300x225.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Simple Step Gaming Camo</h4>
                                            <p class="card-text mb-4">
                                                850000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in treem">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/kid-4-1-300x225.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Simple Step Summer Fundamentals</h4>
                                            <p class="card-text mb-4">
                                                750000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in treem">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/kid-5-1-300x225.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Simple Step Summer Fundamentals"</h4>
                                            <p class="card-text mb-4">
                                                750000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 mb-4" ng-repeat="sanpham in treem">
                                    <div class="card text-center">
                                        <img class="card-img-top khuyenmai" src="./View/Anh/kid-6-1-300x225.jpg" alt="">
                                        <div class="card-body">
                                            <h4 class="card-title">Chuck Taylor All Star Simple Step Watermelon</h4>
                                            <p class="card-text mb-4">
                                                900000</p>
                                            <a class="btn btn-danger" href="">Thêm Vào Giỏ</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- tre em -->
                        </div>
                    </div>
                    <!--  -->
                </div>
            </div>
        </div>
    </div>
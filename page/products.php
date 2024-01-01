<?php
    $url = getQueryString("url");
    if(!isset($url) || !$url) {
        $pageTitle = "Sản phẩm";
        $pageDescription = "";
    }else {
        $urlArray = explode(".", $url);
        if(!isset($urlArray[1])) {
            echo "Id không hợp lệ";
            exit();
        }
        $id = $urlArray[1];
        $sql = "SELECT product_category_name, product_category_description FROM product_categories WHERE product_category_id = ".$id;
        $productCategory = findOne($sql);
        if($productCategory['code'] !== 200) {
            echo $productCategory['message'] ;
            exit();
        }
        if(!$productCategory['data']) {
            $pageTitle = "404";
            $pageDescription = "";
        }else {
            $pageTitle = $productCategory['data']['product_category_name'];
            $pageDescription = $productCategory['data']['product_category_description'];
        }
    }
    include_once("inc/global/header.php");
?>

<!-- banner-2 -->
<div class="page-head_agile_info_w3l">

</div>
<!-- //banner-2 -->
<!-- page -->
<div class="services-breadcrumb">
    <div class="agile_inner_breadcrumb">
        <div class="container">
            <ul class="w3_short">
                <li>
                    <a href="index.html">Home</a>
                    <i>|</i>
                </li>
                <li><?php echo $pageTitle ?></li>
            </ul>
        </div>
    </div>
</div>
<!-- //page -->
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3"><?php echo $pageTitle ?></h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <div class="product-sec mb-4">
                        <div class="row" id="products-row">
                        </div>
                        <div class="d-flex align-items-center justify-content-center">
                            <button class="btn btn-primary d-none" id="products-loadmore-btn">Xem thêm</button>
                        </div>
                    </div>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->
            <!-- product right -->
            <div class="col-lg-3 mt-lg-0 mt-4 p-lg-0">
                <div class="side-bar p-sm-4 p-3">
                    <div class="search-hotel border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Brand</h3>
                        <form action="#" method="post">
                            <input type="search" placeholder="Search Brand..." name="search" required="">
                            <input type="submit" value=" ">
                        </form>
                        <div class="left-side py-2">
                            <ul>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Samsung</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Red Mi</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Apple</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Nexus</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Motorola</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Micromax</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Lenovo</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Oppo</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">Sony</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">LG</span>
                                </li>
                                <li>
                                    <input type="checkbox" class="checked">
                                    <span class="span">One Plus</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- ram -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Ram</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Less than 512 MB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">512 MB - 1 GB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">1 GB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">2 GB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">3 GB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">5 GB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">6 GB</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">6 GB & Above</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //ram -->
                    <!-- price -->
                    <div class="range border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Price</h3>
                        <div class="w3l-range">
                            <ul>
                                <li>
                                    <a href="#">Under $1,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="#">$1,000 - $5,000</a>
                                </li>
                                <li>
                                    <a href="#">$5,000 - $10,000</a>
                                </li>
                                <li class="my-1">
                                    <a href="#">$10,000 - $20,000</a>
                                </li>
                                <li>
                                    <a href="#">$20,000 $30,000</a>
                                </li>
                                <li class="mt-1">
                                    <a href="#">Over $30,000</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <!-- //price -->
                    <!-- discounts -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Discount</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">5% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">10% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">20% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">30% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">50% or More</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">60% or More</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //discounts -->
                    <!-- offers -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Offers</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Exchange Offer</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">No Cost EMI</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Special Price</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //offers -->
                    <!-- delivery -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">Cash On Delivery</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Eligible for Cash On Delivery</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //delivery -->
                    <!-- arrivals -->
                    <div class="left-side border-bottom py-2">
                        <h3 class="agileits-sear-head mb-3">New Arrivals</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Last 30 days</span>
                            </li>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Last 90 days</span>
                            </li>
                        </ul>
                    </div>
                    <div class="left-side py-2">
                        <h3 class="agileits-sear-head mb-3">Availability</h3>
                        <ul>
                            <li>
                                <input type="checkbox" class="checked">
                                <span class="span">Exclude Out of Stock</span>
                            </li>
                        </ul>
                    </div>
                    <!-- //arrivals -->
                </div>
                <!-- //product right -->
            </div>
        </div>
    </div>
</div>
<!-- //top products -->
<?php  
    include_once("inc/global/footer.php");
    include_once("inc/global/script.php");
?>
<script>
// Get products
async function getProducts(productCategoryId, page, limit) {
    try {
        let url = `api/products.php?page=${page}&limit=${limit}`;
        if (productCategoryId) {
            url += `api/products.php?page=${page}&limit=${limit}&product-category-id=${productCategoryId}`;
        }
        const products = await getData(url);
        if (products.code !== 200) return false;
        return products.data;
    } catch (err) {
        if (err) return false
    }
}

// Get Number Of Products
async function getNumberOfProduct(productCategoryId) {
    try {
        let url = `api/number-of-product.php`;
        if (productCategoryId) {
            url += `?product-category-id=${productCategoryId}`;
        }
        const numberOfProducts = await getData(url);
        if (numberOfProducts.code !== 200) return false;
        return Number(numberOfProducts.data[0].number_of_product);
    } catch (err) {
        if (err) return false;
    }
}
</script>
<script>
// Render products 
async function renderProducts(productCategoryId, page, limit) {
    const productsRow = document.getElementById("products-row");

    const products = await getProducts(productCategoryId, page);

    if (!products) {
        return productsRow.innerHTML =
            `
                <div class="row">
                    <div class="col-md-12">
                        <p>Đã có lỗi xảy ra</p>
                    </div>
                </div>
                `
    }

    if (products.length === 0) {
        return productsRow.innerHTML =
            `
                <div class="row">
                    <div class="col-md-12">
                        <p>Không tìm thấy sản phẩm nào</p>
                    </div>
                </div>
                `
    }

    let productsColText = "";

    products.forEach((product, index) => {
        productsColText +=
            `
            <div class="col-md-4 product-men my-3">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item text-center">
                        <img class="img-fluid" src="${product.image_url}" alt="${product.image_alt}" title="${product.image_title}" loading="lazy" style="object-fit: cover;" />
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="?page=single-product&url=${product.product_url}.${product.product_id}" class="link-product-add-cart">Xem sản phẩm</a>
                            </div>
                        </div>
                        ${product.product_hot == 1 ? ` <span class="product-new-top">New</span>` : ""}
                    </div>
                    <div class="item-info-product text-center border-top mt-4">
                        <h4 class="pt-1">
                            <a href="?page=single-product&url=${product.product_url}.${product.product_id}">${product.product_name}</a>
                        </h4>
                        <div class="info-product-price my-2">
                            ${product.product_max_price ? 
                            `
                            <span class="item_price">${formatPrice(product.product_min_price)}</span>
                            <del>${formatPrice(product.product_max_price)}</del>
                            ` 
                            : 
                            `
                            <span class="item_price">${formatPrice(product.product_min_price)}</span>
                            `
                            }
                        </div>
                        <div
                            class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out">
                            <form action="#" method="post">
                                <fieldset>
                                    <input type="hidden" name="cmd" value="_cart" />
                                    <input type="hidden" name="add" value="1" />
                                    <input type="hidden" name="business" value=" " />
                                    <input type="hidden" name="item_name" value="Samsung Galaxy J7" />
                                    <input type="hidden" name="amount" value="200.00" />
                                    <input type="hidden" name="discount_amount" value="1.00" />
                                    <input type="hidden" name="currency_code" value="USD" />
                                    <input type="hidden" name="return" value=" " />
                                    <input type="hidden" name="cancel_return" value=" " />
                                    <input type="submit" name="submit" value="Thêm vào giỏ"
                                        class="button btn" />
                                </fieldset>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
            `
    });

    if (page === 1) return productsRow.innerHTML = productsColText;

    const lastChild = productsRow.lastElementChild;

    if (lastChild) return lastChild.insertAdjacentHTML("afterend", productsColText);

    productsRow.innerHTML =
        ` <div class="row">
            <div class="col-md-12">
                <p>Đã có lỗi</p>
            </div>
        </div>`;
}

//Render loadmore btn
async function renderLoadmoreProductsBtn(productCategoryId, page, limit, setPage) {
    const productsLoadmoreBtn = document.getElementById("products-loadmore-btn");

    const numberOfProduct = await getNumberOfProduct(productCategoryId);

    const numberOfPage = Math.ceil(numberOfProduct / limit);

    if (numberOfPage > 1) productsLoadmoreBtn.classList.remove("d-none");

    productsLoadmoreBtn.addEventListener("click", async () => {
        setPage(page++);
        await renderProducts(productCategoryId, page, limit);
        if (page >= numberOfPage) productsLoadmoreBtn.classList.add("d-none");
    })
}
</script>

<script>
document.addEventListener("DOMContentLoaded", async () => {
    <?php if(isset($id)) { ?>
    let productCategoryId = <?php echo $id ?>;
    <?php }else{ ?>
    let productCategoryId = null;
    <?php } ?>

    function setPage(page) {
        return page;
    }

    let page = setPage(1);

    let limit = 9;

    await renderProducts(productCategoryId, page, limit);
    
    await renderLoadmoreProductsBtn(productCategoryId, page, limit, setPage);
})
</script>
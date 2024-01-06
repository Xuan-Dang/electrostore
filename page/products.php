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
            <?php include_once "inc/product/sidebar.php" ?>
        </div>
    </div>
</div>
<!-- //top products -->
<?php  
    include_once("inc/global/footer.php");
    include_once("inc/global/script.php");
?>

<script src="js/products/index.js"></script>
<script src='js/sidebar/index.js'></script>
<script>
document.addEventListener("DOMContentLoaded", async () => {

    const getProductsUrl = {
        url: `api/products.php?page=${1}&limit=${9}`,
        data: {
            baseUrl: `api/products.php`,
            page: 1,
            limit: 9,
            productCategory: "",
            filterString: "",
        }
    }

    const setGetProductsUrl = {
        set: async (target, key, value) => {
            target[key] = value;
            console.log(key, value);
            let newUrl =
                `${target.data.baseUrl}?page=${target.data.page}&limit=${target.data.limit}&product-category=${target.data.productCategory}${target.data.filterString}`;
            await renderProducts(newUrl, target.data.page);
        },
    }

    const getProductsUrlProxy = new Proxy(getProductsUrl, setGetProductsUrl);

    await renderProducts(getProductsUrlProxy.url, getProductsUrlProxy.data.page);

    const getNumberOfProductUrl = {
        url: `api/number-of-product.php`,
        productCategory: "",
        filterString: "",
    }

    const setNumberOfProductUrl = {
        set: async (target, key, value) => {
            target[key] = value;
            let newUrl =
                `${target.url}?product-category=${target.productCategory}${target.filterString}`;
            await renderLoadmoreProductsBtn(newUrl, getProductsUrlProxy);
        }
    }

    const getNumberOfProductProxy = new Proxy(getNumberOfProductUrl, setNumberOfProductUrl);

    await renderLoadmoreProductsBtn(getNumberOfProductProxy.url, getProductsUrlProxy);

    const getProductAttributesUrl = {
        url: `api/product-attr-keys.php`,
        productCategory: "",
    }

    const setProductAttributesUrl = {
        set: async (target, key, value) => {
            target[key] = value;
            let newUrl =
                `${target.url}?product-category=${target.productCategory}${target.filterString}`;
            await renderSidebarData(newUrl);
        }
    }

    const getProductAttributesUrlProxy = new Proxy(getProductAttributesUrl, setProductAttributesUrl);

    await renderSidebarData(getProductAttributesUrl);

    <?php if(isset($id)) { ?>
    getProductsUrlProxy.productCategory = <?php echo $id ?>;
    getNumberOfProductProxy.productCategory = <?php echo $id ?>;
    getProductAttributesUrlProxy.productCategory = <?php echo $id ?>;
    <?php }?>

    const productSidebarInput = document.querySelectorAll("#products-sidebar .checked");

    const inputData = {};

    function createInputData(name, value) {
        if (!inputData[`${name}`]) {
            inputData[`${name}`] = []
        }

        if (inputData[`${name}`].filter((item) => item === value).length === 0) {
            inputData[`${name}`].push(value);
        } else {
            inputData[`${name}`] = inputData[`${name}`].filter((item) => value !== item)
        }
    }

    productSidebarInput.forEach((input) => {
        input.addEventListener("change", async (e) => {
            createInputData(e.target.name, e.target.value);

            let text = "";

            for (let item in inputData) {
                text += `&${item}=${inputData[item].join(',')}`
            }

            getProductsUrlProxy.data = {... getProductsUrlProxy.data, page:1, filterString:text}

            getNumberOfProductProxy.filterString = text;

        })
    })

})
</script>
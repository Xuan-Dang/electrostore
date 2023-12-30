// Function get slides
async function getSlides() {
  try {
    const slides = await getData("api/slides.php");
    if (slides.code !== 200) return false;
    return slides.data;
  } catch (err) {
    if (err) return false;
  }
}

// Render slides
document.addEventListener("DOMContentLoaded", async () => {
  const homeBannerWrapper = document.getElementById("home-banner__wrapper");
  const homeCarouselIndicators = document.getElementById("home-carousel-indicators");
  const slides = await getSlides();
  if (!slides)
    return (homeBannerWrapper.innerHTML = ` 
        <div class="carousel-item item1 active">
            <div class="container">
               <p>Đã có lỗi gì đó xảy ra</p>
            </div>
        </div>
    `);
  let slideItemText = "";
  let carouselExampleIndicatorsText = "";
  slides.forEach((slide, index) => {
    slideItemText += `
        <div class="carousel-item item${index + 1} ${
          index === 0 ? "active" : ""
        }" style="background-image: url('${slide.image_url}')">
            <div class="container">
                <div class="w3l-space-banner">
                    <div class="carousel-caption p-lg-5 p-sm-4 p-3">
                        <p>${slide.slide_text}</p>
                        <h3 class="font-weight-bold pt-2 pb-lg-5 pb-4">${
                          slide.slide_title
                        }</h3>
                        <a class="button2" href="${
                          slide.slide_link
                        }">Mua ngay</a>
                    </div>
                </div>
            </div>
        </div>
    `;
    carouselExampleIndicatorsText+=` <li data-target="#carouselExampleIndicators" data-slide-to="${index}" class="${index === 0 ? "active" : ""}"></li>`
  });
  homeBannerWrapper.innerHTML = slideItemText;
  homeCarouselIndicators.innerHTML = carouselExampleIndicatorsText;
});

// Function get product categories
async function getProductCategories() {
  try {
    const productCategories = await getData("api/home-product-categories.php");
    if(productCategories.code !== 200) return false;
    return productCategories.data;
  }catch(err) {
    if(err) return false;
  }
}

// Function get product by product category
async function getProductsByCategory(categoryId) {
  try {
    const productsByCategires = await getData(`api/home-products-by-category.php?category-id=${categoryId}`);
    if(productsByCategires.code !== 200) return false;
    return productsByCategires.data;
  }catch(err) {
    if(err) return false;
  }
}

// Render product by category
document.addEventListener("DOMContentLoaded", async () => {
  const homeProductByCategorySection = document.getElementById('home-products-by-category-section');
  const productCategories  = await getProductCategories();
  console.log("productCategories: ", productCategories)
  if(!productCategories) {
    return homeProductByCategorySection.innerHTML =
    `
    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
      Đã có lỗi xảy ra
    </div>
    `
  }
  let productCategoryText = "";
  for(let category of productCategories) {
    const productsByCategory = await getProductsByCategory(category.product_category_id);
    let productsByCategoryText = "";
    productsByCategory.forEach((product) => {
      productsByCategoryText += 
      `
      <!-- Product item -->
      <div class="col-md-4 product-men mt-5">
          <div class="men-pro-item simpleCart_shelfItem">
              <div class="men-thumb-item text-center">
                  <img src=${product.image_url} alt=${product.image_alt} title=${product.image_title} loading="lazy">
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
                              <input type="hidden" name="item_name" value="Apple iPhone X" />
                              <input type="hidden" name="amount" value="280.00" />
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
      <!-- // Product item -->
      `
    })
    productCategoryText += 
    `
    <!-- Product section -->
    <div class="product-sec1 px-sm-4 px-3 py-sm-5  py-3 mb-4">
        <h3 class="heading-tittle text-center font-italic">${category.product_category_name}</h3>
        <div class="row">
           ${productsByCategoryText}
        </div>
    </div>
    <!-- // Product item -->
    `
  }
  homeProductByCategorySection.innerHTML = productCategoryText;
})
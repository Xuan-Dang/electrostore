// Get products
async function getProducts(url) {
  try {
    const products = await getData(url);
    if (products.code !== 200) return false;
    return products.data;
  } catch (err) {
    if (err) return false;
  }
}
// --Get products

// Get number of products
async function getNumberOfProduct(url) {
  try {
    const numberOfProducts = await getData(url);
    if (numberOfProducts.code !== 200) return false;
    return Number(numberOfProducts.data[0].number_of_product);
  } catch (err) {
    if (err) return false;
  }
}
// --Get number of products

// Render products
async function renderProducts(url, page) {
  const productsRow = document.getElementById("products-row");

  const products = await getProducts(url);

  if (!products) {
    return (productsRow.innerHTML = `
                <div class="row">
                    <div class="col-md-12">
                        <p>Đã có lỗi xảy ra</p>
                    </div>
                </div>
                `);
  }

  if (products.length === 0) {
    return (productsRow.innerHTML = `
                <div class="row">
                    <div class="col-md-12">
                        <p>Không tìm thấy sản phẩm nào</p>
                    </div>
                </div>
                `);
  }

  let productsColText = "";

  products.forEach((product, index) => {
    productsColText += `
            <div class="col-md-4 product-men my-3">
                <div class="men-pro-item simpleCart_shelfItem">
                    <div class="men-thumb-item text-center">
                        <img class="img-fluid" src="${
                          product.image_url
                        }" alt="${product.image_alt}" title="${
      product.image_title
    }" loading="lazy" style="object-fit: cover;" />
                        <div class="men-cart-pro">
                            <div class="inner-men-cart-pro">
                                <a href="?page=single-product&url=${
                                  product.product_url
                                }.${
      product.product_id
    }" class="link-product-add-cart">Xem sản phẩm</a>
                            </div>
                        </div>
                        ${
                          product.product_hot == 1
                            ? ` <span class="product-new-top">New</span>`
                            : ""
                        }
                    </div>
                    <div class="item-info-product text-center border-top mt-4">
                        <h4 class="pt-1">
                            <a href="?page=single-product&url=${
                              product.product_url
                            }.${product.product_id}">${product.product_name}</a>
                        </h4>
                        <div class="info-product-price my-2">
                            ${
                              product.product_max_price
                                ? `
                            <span class="item_price">${formatPrice(
                              product.product_min_price
                            )}</span>
                            <del>${formatPrice(product.product_max_price)}</del>
                            `
                                : `
                            <span class="item_price">${formatPrice(
                              product.product_min_price
                            )}</span>
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
            `;
  });

  if (page === 1) return (productsRow.innerHTML = productsColText);

  const lastChild = productsRow.lastElementChild;

  if (lastChild)
    return lastChild.insertAdjacentHTML("afterend", productsColText);

  productsRow.innerHTML = ` <div class="row">
            <div class="col-md-12">
                <p>Đã có lỗi</p>
            </div>
        </div>`;
}
// --Render products

//Render loadmore btn
async function renderLoadmoreProductsBtn(url, getProductsUrlProxy) {
  const productsLoadmoreBtn = document.getElementById("products-loadmore-btn");

  const numberOfProduct = await getNumberOfProduct(url);
  
  const numberOfPage = Math.ceil(numberOfProduct / getProductsUrlProxy.data.limit);
  
  if (numberOfPage > 1) {
    productsLoadmoreBtn.classList.remove("d-none");
  } else {
    productsLoadmoreBtn.classList.add("d-none");
  }

  productsLoadmoreBtn.onclick = function handleChangePage() {
    getProductsUrlProxy.data = {...getProductsUrlProxy.data, page: getProductsUrlProxy.data.page + 1}
    if(getProductsUrlProxy.data.page >= numberOfPage) return productsLoadmoreBtn.classList.add("d-none");
  }
  
}
// --Render loadmore btn

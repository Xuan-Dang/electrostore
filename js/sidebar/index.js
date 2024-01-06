async function getProductAttrKeys(url) {
  try {
    const res = await getData(url);
    if (res.code !== 200) return false;
    return res.data;
  } catch (err) {
    if (err) return false;
  }
}
async function getProductAttrValues(url) {
  try {
    const res = await getData(url);
    if (res.code !== 200) return false;
    return res.data;
  } catch (err) {
    if (err) return false;
  }
}
async function renderSidebarData(getProductAttributesUrl) {
  const productsSidebar = document.getElementById("products-sidebar");
  const productAttrKeys = await getProductAttrKeys(getProductAttributesUrl.url);
  if (!productAttrKeys) return (productsSidebar.innerHTML = "Đã có lỗi xả ra");
  let attrKeyItem = "";
  for (let attrKey of productAttrKeys) {
    let url = `api/product-attr-values.php?product-attr-key=${attrKey.attr_key_id}`;
    if(getProductAttributesUrl.productCategory) url += `&product-category=${getProductAttributesUrl.productCategory}`;
    const productAttrValues = await getProductAttrValues(url);
    let productAttrValueItem = "";
    if (!productAttrValues)
        return (productAttrValueItem += `<li class="d-flex align-items-center">Đã có lỗi khi lấy danh sách ${attrKey.attr_key_name}</li>`);
    productAttrValues.forEach((attrValue) => {
      productAttrValueItem += `
            <li class="d-flex align-items-center">
                <input type="checkbox" name="filter_${attrKey.attr_key_id}" value="${attrValue.attr_value_id}" class="checked m-0 p-2 d-block mr-1" style="width: 20px; height: 20px;">
                <span class="span">${attrValue.attr_value_name}</span>
            </li>
            `;
    });
    attrKeyItem += 
    `
        <div class="search-hotel border-bottom py-2">
            <h3 class="agileits-sear-head mb-3">${attrKey.attr_key_name}</h3>
            <div class="left-side py-2">
                <ul>
                    ${productAttrValueItem}
                </ul>
            </div>
        </div>
    `
  }
  productsSidebar.innerHTML = attrKeyItem;
}

async function getProductsAttribute(url) {
    try {
        const res = await getData(url);
        if(res.code !== 200) return false;
        return res.data;
    }catch(err) {
        if(err) return false;
    }
}
async function renderSidebarData(url) {
    const productsSidebar = document.getElementById("products-sidebar");
    const sidebarData = await getProductsAttribute(url)
    if(!sidebarData) return productsSidebar.innerHTML = "Đã có lỗi xả ra";
    if (Object.keys(sidebarData).length > 0) {
        let sidebarDataText = "";
        for (let key in sidebarData) {
            let sidebarDataItemText = "";
            sidebarData[key].forEach((item, index) => {
                sidebarDataItemText +=
                    `
                        <li class="d-flex align-items-center">
                            <input type="checkbox" name="${item.term_url}.${item.product_term_id}" value="${item.term_taxonomy_id}" class="checked m-0 p-2 d-block mr-1" style="width: 20px; height: 20px;">
                            <span class="span">${item.term_taxonomy_name}</span>
                        </li>
                    `
            })
            sidebarDataText +=
            `
                <div class="search-hotel border-bottom py-2">
                    <h3 class="agileits-sear-head mb-3">${key}</h3>
                    <div class="left-side py-2">
                        <ul>
                            ${sidebarDataItemText}
                        </ul>
                    </div>
                </div>
            `
        }
        productsSidebar.innerHTML = sidebarDataText;
    }
}
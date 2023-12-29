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
  slides.forEach((slide, index) => {
    slideItemText += `
        <div class="carousel-item item1 ${
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
  });
  homeBannerWrapper.innerHTML = slideItemText;
});

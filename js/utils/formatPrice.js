function formatPrice(number) {
  return new Intl.NumberFormat("vn-VN", {
    style: "currency",
    currency: "vnd",
  }).format(number);
}

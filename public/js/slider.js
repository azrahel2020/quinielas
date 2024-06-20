$('#slider').owlCarousel({
  loop: true,
  margin: 30,
  dots: false,
  nav: false,
  autoplay:true,
  autoplayTimeout:8000,
  autoplayHoverPause:true,
  items : 1,
  
})

$('#owl-carousel').owlCarousel({
  loop: true,
  margin: 30,
  dots: false,
  nav: false,
  autoplay:true,
  autoplayTimeout:3000,
  autoplayHoverPause:true,
  items : 5,
  responsive: {
  0: {
    items: 2
  },

  600: {
    items: 3
  },

  1024: {
    items: 5
  },

  1366: {
    items: 7
  }
}
})

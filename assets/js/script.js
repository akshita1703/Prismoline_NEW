// UI HANDLERS =====================================================================================================



$(window).on("scroll resize", function () {



  if ($(window).width() > 576) {



    if ($(this).scrollTop() > 220) {



      $(".sticky-top")

        .addClass("sticky-nav")

        .css("top", "0px");



    } else {



      $(".sticky-top")

        .removeClass("sticky-nav")

        .css("top", "-100px");

    }



  } else {



    if ($(this).scrollTop() > 0) {



      $(".sticky-top")

        .addClass("sticky-nav")

        .css("top", "0px");



    } else {



      $(".sticky-top")

        .removeClass("sticky-nav")

        .css("top", "-100px");

    }

  }

});



// $(window).scroll(function () {

//   if ($(this).scrollTop() > 220) {

//     $(".sticky-top").addClass("sticky-nav").css("top", "0px");

//   } else {

//     $(".sticky-top").removeClass("sticky-nav").css("top", "-100px");

//   }

// });



// LAZY LOADER HANDLER =============================================================================================



function lazyLoad() {

  $('.lazy').each(function () {

    var element = $(this);

    if (element.offset().top < $(window).scrollTop() + $(window).height()) {

      element.attr('src', element.data('src'));

      element.removeClass('lazy'); // remove class so it's not checked again

    }

  });

}



$(window).on('scroll', lazyLoad);

lazyLoad();



// CAROUSEL HANDLER ================================================================================================



const img_url = "assets/images/banners/";



const posts = [

  {

    title: "",

    description: "",

    imageSrc: img_url + "1.png",

    url: "#"

  },

  {

    title: "",

    description: "",

    imageSrc: img_url + "2.jpeg",

    url: "#"

  },

  {

    title: "",

    description: "",

    imageSrc: img_url + "3.jpeg",

    url: "#"

  },

  {

    title: "",

    description: "",

    imageSrc: img_url + "4.jpeg",

    url: "#"

  }

];



let currentIndex = 0;

let direction = 1;

const $carousel = $("#carousel");



function createSlide(post, index) {

  const $slide = $("<div>").addClass("slide");

  if (index === currentIndex) $slide.addClass("active");

  $slide.css("background-image", `url(${post.imageSrc})`);



  const slideHTML = `

    <div class="overlay"></div>

    <div class="slide-content">

      <div class="hero-text text-lg-start">

        <h1 class="hero-title text-light fw-bold mb-3 animate-title">

            <span style="color:#FF9933;">India</span>'s Trusted Manufacturer of <br class="d-none d-lg-block">

            <span style="color: #4875b9">Thermoplastic Road Marking Paint</span> and <span style="color:#138808;">Road Safety Products</span>

        </h1>

        <div class="hero-badge animate-subtitle">

            <h2 class="hero-subtitle mb-0 py-1"> Supplying to NHAI, State PWDs, and Infrastructure Contractors. <span class="fw-semibold">BIS & MORTH Compliant</span>

            </h2>

        </div>

      </div>

      <div class="hero-cta d-flex flex-wrap gap-3 mt-4 mb-3 mb-sm-4">

          <a href="contact/" class="btn btn-primary cta-btn-primary">

              Get a Quote

          </a>

          <a href="#brochure-form-container" class="btn btn-outline-light cta-btn-secondary">

              Download Brochure

          </a>

      </div>

        <!-- <h2><a href="${post.url}" style="color:white; text-decoration:none; opacity: 0.8; font-size: 26px" target="_blank">${post.title}</a></h2> -->

        <!-- <p style="opacity: 0.7; font-weight: 300; font-size: 15px;">${post.description}</p> -->

      </div>

    </div>

  `;



  $slide.html(slideHTML);

  return $slide;

}



function renderSlides() {

  $carousel.empty();



  $.each(posts, function (i, post) {

    const $slide = createSlide(post, i);

    $carousel.append($slide);

  });



  const $controls = $("<div>").addClass("controls");

  const $dots = $("<div>").addClass("dots");



  $.each(posts, function (i) {

    const $dot = $("<div>")

      .addClass("dot")

      .toggleClass("active", i === currentIndex)

      .on("click", function () {

        direction = i > currentIndex ? 1 : -1;

        currentIndex = i;

        updateSlides();

      });

    $dots.append($dot);

  });



  const $arrows = $("<div>").addClass("arrows");

  const $prevBtn = $("<button>")

    .addClass("arrow-btn")

    .text("<")

    .on("click", function () {

      direction = -1;

      currentIndex = (currentIndex - 1 + posts.length) % posts.length;

      updateSlides();

    });



  const $nextBtn = $("<button>")

    .addClass("arrow-btn")

    .text(">")

    .on("click", function () {

      direction = 1;

      currentIndex = (currentIndex + 1) % posts.length;

      updateSlides();

    });



  $arrows.append($prevBtn, $nextBtn);

  $controls.append($dots, $arrows);

  $carousel.append($controls);

}



function updateSlides() {

  const $slides = $(".slide");

  $slides.removeClass("active exit-left exit-right");



  $slides.each(function (i) {

    const $slide = $(this);

    if (i === currentIndex) {

      $slide.addClass("active");

    } else if (direction === 1) {

      $slide.addClass("exit-left");

    } else {

      $slide.addClass("exit-right");

    }

  });



  $(".dot").each(function (i) {

    $(this).toggleClass("active", i === currentIndex);

  });

}



setInterval(function () {

  direction = 1;

  currentIndex = (currentIndex + 1) % posts.length;

  updateSlides();

}, 6000);



$(document).ready(function () {

  renderSlides();

});



// PRODUCTS HANDLER ================================================================================================



$('.product-item').on('click', function () {

  let name = $(this).data('name');

  let category = $(this).data('category');

  let image = $(this).data('image');

  let description = $(this).data('description');



  $('#productModalLabel').text(name);

  $('#productModalCategory').text(category);

  $('#productModalImage').attr('src', image);

  $('#productModalDescription').text(description);

});



// ABOUT SECTION ANIMATION ==========================================================================================



const fadeElements = document.querySelectorAll('.fade-up');



const fadeObserver = new IntersectionObserver((entries) => {

  entries.forEach(entry => {

    if (entry.isIntersecting) {

      entry.target.classList.add('show');

    }

  });

}, {

  threshold: 0.2

});



fadeElements.forEach(el => fadeObserver.observe(el));



// STATISTICS COUNTER ==============================================================================================



function animateCounter(el, target) {

  let start = 0;

  const duration = 2000;

  const startTime = performance.now();



  function update(currentTime) {

    const progress = Math.min((currentTime - startTime) / duration, 1);



    // smooth stop easing

    const easeOut = 1 - Math.pow(1 - progress, 3);



    const value = Math.floor(easeOut * target);



    el.textContent = value.toLocaleString();



    if (progress < 1) {

      requestAnimationFrame(update);

    } else {

      el.textContent = target.toLocaleString() + "+";

    }

  }



  requestAnimationFrame(update);

}



// TESTIMONIALS HANDLER ============================================================================================



$(".testimonial .card").click(function () {

  var targetId = $(this).data("id");



  // Remove 'active' from all cards and content boxes

  $(".testimonial .card").removeClass("active");

  $(".testimonial .contentBox").removeClass("active");



  // Add 'active' to clicked card and corresponding content

  $(this).addClass("active");

  $("#" + targetId).addClass("active");

});



// CONTACT US ======================================================================================================



$("#contact_form").submit(async function (e) {

  e.preventDefault();



  if (

    $("#name").val().trim() == "" ||

    $("#company").val().trim() == "" ||

    $("#phone").val().trim() == "" ||

    $("#email").val().trim() == "" ||

    $("#product_interest").val().trim() == "" ||

    $("#message").val().trim() == ""

  ) {

    var msg = "Please fill all required details.";

    Swal.fire({

      title: "Missing Details",

      icon: "info",

      text: msg

    });



    return 0;

  }



  try {

    $("#contact_form_btn").prop("disabled", true);



    let formData = new FormData(this);

    formData.append("action", "website_contact_us");



    let response = await fetch(API, {

      method: "POST",

      body: formData,

    });



    if (!response.ok) {

      throw new Error(`HTTP error! Status: ${response.status}`);

    }



    let result = await response.json();



    if (result.status == 1) {



      Swal.fire({

        icon: "success",

        title: "Message Sent",

        html: result.msg,

      });



    } else {

      Swal.fire({

        icon: "error",

        title: result.msg,

        html: "Please check details and try again.",

      });

    }

  } catch (error) {

    Swal.fire({

      icon: "error",

      title: "Internal Error",

      text: "Please contact through phone or email mentioned in our portal.",

    });

    console.log(error);

  } finally {

    $("#contact_form")[0].reset();

    $("#contact_form_btn").prop("disabled", false);

  }



});



// NEWSLETTER US ======================================================================================================



$("#newsletter_form").submit(async function (e) {

  e.preventDefault();



  if (

    $("#newsletter_email").val().trim() == ""

  ) {

    var msg = "Please enter valid email address.";

    Swal.fire({

      title: "Missing Email Address",

      icon: "info",

      text: msg

    });



    return 0;

  }



  try {

    $("#newsletter_submit_btn").prop("disabled", true);



    let formData = new FormData(this);

    formData.append("action", "website_newsletter");



    let response = await fetch(API, {

      method: "POST",

      body: formData,

    });



    if (!response.ok) {

      throw new Error(`HTTP error! Status: ${response.status}`);

    }



    let result = await response.json();



    if (result.status == 1) {



      Swal.fire({

        icon: "success",

        title: "Subscribed Successfully.",

        html: result.msg,

      });



    } else {

      Swal.fire({

        icon: "error",

        title: result.msg,

        html: "Please check your entered email and try again.",

      });

    }

  } catch (error) {

    Swal.fire({

      icon: "error",

      title: "Internal Error",

      text: "Please contact through phone or email mentioned in our portal.",

    });

    console.log(error);

  } finally {

    $("#newsletter_form")[0].reset();

    $("#newsletter_submit_btn").prop("disabled", false);

  }

});



// CAREER FORM HANDLER =============================================================================================



$("#career-form").submit(async function (e) {

  e.preventDefault();



  try {

    $("#career-form-button").prop("disabled", true);



    let formData = new FormData(this);

    formData.append("action", "career_form_submission");



    let response = await fetch(API, {

      method: "POST",

      body: formData,

    });



    if (!response.ok) {

      throw new Error(`HTTP error! Status: ${response.status}`);

    }



    let result = await response.json();



    if (result.status == 1) {

      Swal.fire({

        icon: "success",

        title: "Message Sent",

        html: result.msg,

      });



    } else {

      Swal.fire({

        icon: "info",

        title: result.msg,

        html: "Please try again.",

      });

    }

  } catch (error) {

    Swal.fire({

      icon: "error",

      title: "Internal Error",

      text: "Please contact through phone or email mentioned in our portal.",

    });

    console.log(error);

  } finally {

    $("#career-form")[0].reset();

    $("#career-form-button").prop("disabled", false);

  }



});



$("#download_brochure_form").submit(async function (e) {

  e.preventDefault();



  let name = $(this).find("input").eq(0).val().trim();

  let company = $(this).find("input").eq(1).val().trim();

  let phone = $(this).find("input").eq(2).val().trim();



  if (name == "" || company == "" || phone == "") {

    Swal.fire({

      title: "Missing Details",

      icon: "info",

      text: "Please fill all required details."

    });

    return false;

  }



  try {

    $("#download_brochure_form button[type='submit']")

      .prop("disabled", true)

      .html(`

                <span class="spinner-border spinner-border-sm me-2"></span>

                Processing...

            `);



    let formData = new FormData(this);

    formData.append("action", "download_brochure");



    let response = await fetch(API, {

      method: "POST",

      body: formData,

    });



    if (!response.ok) {

      throw new Error(`HTTP Error! Status: ${response.status}`);

    }



    let result = await response.json();



    if (result.status == 1) {

      Swal.fire({

        icon: "success",

        title: "Download Started",

        html: result.msg,

      });



      const filePath = "/downloads/prismoline_brochure.pdf";



      const link = document.createElement("a");

      link.href = filePath;

      link.download = "prismoline_brochure.pdf";



      document.body.appendChild(link);

      link.click();

      document.body.removeChild(link);

    } else {

      Swal.fire({

        icon: "error",

        title: result.msg,

        html: "Please check details and try again.",

      });

    }



  } catch (error) {

    console.log(error);

    Swal.fire({

      icon: "error",

      title: "Internal Error",

      text: "Please try again later.",

    });



  } finally {

    $("#download_brochure_form")[0].reset();



    $("#download_brochure_form button[type='submit']")

      .prop("disabled", false)

      .html(`

                <i class="fa-solid fa-download me-2"></i>

                Download Brochure

            `);

  }

});
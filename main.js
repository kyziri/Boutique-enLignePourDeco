// Pour le slider:
const swiperAccueil = new Swiper(".sliderbox",
  {
    loop: true,
    effect: 'fade',
    autoHeight: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

/*===================
     swiper Categories:
 ====================*/
var swiperCategories = new Swiper(".categories__container", {
  spaceBetween: 24,
  loop: true,

  navigation: {
    nextEl: ".swiper-btn-next",
    prevEl: ".swiper-btn-prev",
  },
  breakpoints: {
    640: {
      slidesPerView: 2,
      spaceBetween: 20,
    },
    768: {
      slidesPerView: 4,
      spaceBetween: 40,
    },
    1400: {
      slidesPerView: 6,
      spaceBetween: 24,
    },
  },

});

document.addEventListener("DOMContentLoaded", function () {
  const paymentMethodSelect = document.getElementById("payment-method");
  const paymentInstructions = document.getElementById("payment-instructions");
  const creditCardDetails = document.getElementById("credit-card-details"); // Ajout de cette ligne pour récupérer les détails de la carte de crédit

  paymentMethodSelect.addEventListener("change", function () {
    const selectedPaymentMethod = paymentMethodSelect.value;

    // Réinitialiser les instructions de paiement
    paymentInstructions.innerHTML = "";

    // Cacher les détails de la carte de crédit par défaut
    creditCardDetails.classList.add("hidden");

    // Afficher les instructions selon le mode de paiement sélectionné
    if (selectedPaymentMethod === "credit-card") {
      creditCardDetails.classList.remove("hidden");
    } else if (selectedPaymentMethod === "paypal") {
      paymentInstructions.innerHTML = "Veuillez effectuer le paiement à notre compte PayPal : leamsidecopaypal@deco.com";
    } else if (selectedPaymentMethod === "bank-transfer") {
      paymentInstructions.innerHTML = "Veuillez effectuer le paiement par virement bancaire à notre compte suivant :<br>Titulaire du compte: LeamsiDéco<br>Numéro de compte: 1234567890123456 <br>Nom de la banque: BNI <br>Code SWIFT/BIC: ABCDEF12345";
    }
  });
});

// // Pour stocker le produit
// document.addEventListener('DOMContentLoaded', function() {
//   const addToCartButtons = document.querySelectorAll('.cart_btn');
//   addToCartButtons.forEach(button => {
//       button.addEventListener('click', function(event) {
//           event.preventDefault();
//           const productId = button.getAttribute('data-product-id');
//           // Ici, vous pouvez ajouter le produit au panier
//           // en utilisant l'ID du produit (productId)
//       });
//   });
// });

// Pour le dropdown de l'iconn utilisateur:
document.addEventListener('DOMContentLoaded', function() {
  const userMenu = document.querySelector('.user-menu');
  const userDropdown = document.querySelector('.user-dropdown');

  userMenu.addEventListener('mouseenter', function() {
      userDropdown.style.display = 'block';
  });

  userMenu.addEventListener('mouseleave', function() {
      userDropdown.style.display = 'none';
  });

  userDropdown.addEventListener('mouseenter', function() {
      userDropdown.style.display = 'block';
  });

  userDropdown.addEventListener('mouseleave', function() {
      userDropdown.style.display = 'none';
  });
});

// Pour que le image dans le detail de produit soit cliquable:
var imagePrincipal = document.getElementById("Main_image");
var petitImage = document.getElementsByClassName("ptt_img");

petitImage[0].onclick = function () {
    imagePrincipal.src = petitImage[0].src;
}
petitImage[1].onclick = function () {
    imagePrincipal.src = petitImage[1].src;
}
petitImage[2].onclick = function () {
    imagePrincipal.src = petitImage[2].src;
}
petitImage[3].onclick = function () {
    imagePrincipal.src = petitImage[3].src;
}
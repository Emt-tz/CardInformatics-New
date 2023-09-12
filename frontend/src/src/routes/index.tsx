import { component$ } from "@builder.io/qwik";
import { type DocumentHead } from "@builder.io/qwik-city";
import { HomePage }  from "~/components/homepage/homepage";

export default component$(() => {
  return(
    <>
    <HomePage />
    </>
  )
});


export const head: DocumentHead = {
  title: "CARD Informatics | Homepage",
  meta: [
    { name: "viewport", content: "width=device-width, initial-scale=1.0" },
    { name: "description", content: "" },
    { name: "keywords", content: "" },
  ],
  links: [
    {
      href: "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Roboto:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i",
      rel: "stylesheet",
    },
    { href: "/homepage/vendor/fontawesome-free/css/all.min.css", rel: "stylesheet" },
    { href: "/homepage/vendor/animate.css/animate.min.css", rel: "stylesheet" },
    { href: "/homepage/vendor/aos/aos.css", rel: "stylesheet" },
    { href: "/homepage/vendor/bootstrap/css/bootstrap.min.css", rel: "stylesheet" },
    { href: "/homepage/vendor/bootstrap-icons/bootstrap-icons.css", rel: "stylesheet" },
    { href: "/homepage/vendor/boxicons/css/boxicons.min.css", rel: "stylesheet" },
    { href: "/homepage/vendor/glightbox/css/glightbox.min.css", rel: "stylesheet" },
    { href: "/homepage/vendor/swiper/swiper-bundle.min.css", rel: "stylesheet" },
    { href: "/homepage/css/style.css", rel: "stylesheet" },
  ],
};

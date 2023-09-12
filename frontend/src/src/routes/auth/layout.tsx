import { component$, Slot } from "@builder.io/qwik";
import { DocumentHead } from "@builder.io/qwik-city";

export default component$(() => {
  return (
    <>
      <Slot />
    </>
  );
});

export const head: DocumentHead = {
  title: "CARD Informatics",
  meta: [
    {
      name: "description",
      content: "Get instant loans",
    },
  ],
  links: [
    {
      href: "/img/favicon.png",
      rel: "icon",
    },
    {
      href: "/img/apple-touch-icon.png",
      rel: "apple-touch-icon",
    },
    {
      href: "https://fonts.gstatic.com",
      rel: "preconnect",
    },
    {
      href: "https://fonts.googleapis.com/css?family=Niconne&display=swap",
      rel: "stylesheet",
    },
    {
      href: "https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i",
      rel: "stylesheet",
    },
    {
      href: "/vendor/bootstrap/css/bootstrap.min.css",
      rel: "stylesheet",
    },
    {
      href: "/vendor/bootstrap-icons/bootstrap-icons.css",
      rel: "stylesheet",
    },
    {
      href: "/vendor/remixicon/remixicon.css",
      rel: "stylesheet",
    },
    {
      href: "/vendor/boxicons/css/boxicons.min.css",
      rel: "stylesheet",
    },
    {
      href: "/vendor/quill/quill.snow.css",
      rel: "stylesheet",
    },
    {
      href: "/vendor/quill/quill.bubble.css",
      rel: "stylesheet",
    },
    {
      href: "/vendor/simple-datatables/style.css",
      rel: "stylesheet",
    },
    {
      href: "/css/style.css",
      rel: "stylesheet",
    },
  ],
};
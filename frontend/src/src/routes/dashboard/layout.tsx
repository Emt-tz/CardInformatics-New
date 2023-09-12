import { component$, Slot } from "@builder.io/qwik";
import { routeLoader$, type RequestHandler, DocumentHead } from "@builder.io/qwik-city";
import { Footer } from "~/components/footer/footer";
import { Header } from "~/components/header/header";
import { SideBar } from "~/components/sidebar/side-bar";
import { Prisma, PrismaClient } from "@prisma/client";

export const onGet: RequestHandler = async ({ cacheControl }) => {
  // Control caching for this request for best performance and to reduce hosting costs:
  // https://qwik.builder.io/docs/caching/
  cacheControl({
    // Always serve a cached response by default, up to a week stale
    staleWhileRevalidate: 60 * 60 * 24 * 7,
    // Max once every 5 seconds, revalidate on the server to get a fresh version of this page
    maxAge: 5,
  });
};

export const useGetOffers = routeLoader$(async () => {
  const prisma = new PrismaClient();
  const offers = await prisma.credit_offer.findMany();
  return offers;
});

export default component$(() => {
  return (
    <>
      <Header />
      <SideBar />
      <main id="main" class="main">
        <Slot />
      </main>
      <Footer />
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
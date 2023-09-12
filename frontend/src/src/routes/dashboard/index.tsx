import { component$, useVisibleTask$ } from "@builder.io/qwik";
import { DocumentHead } from "@builder.io/qwik-city";
import { useAuthSession } from "../plugin@auth";
import { CreditOffers } from "~/components/cards/credit_offers";
import { NewsCard } from "~/components/cards/news_card";
import { RecentActivity } from "~/components/cards/recent_activity";
import { SummaryCard } from "~/components/cards/summary_card";

export default component$(() => {
  const session = useAuthSession()
  return (
    <>
      <div class="pagetitle">
        <h1>Dashboard</h1>
        <nav>
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/dashboard">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
          </ol>
        </nav>
        <p></p>
      </div>
      {/* <section class="section dashboard">
        <div class="row"> */}
          {/* Left side columns */}
          <div class="col-lg-8">
            <div class="row">
              <SummaryCard title="Total Loans" icon="bi-file-earmark-text" amountText="0" percentNumber="0" percentText="Loans applied" />
              <SummaryCard title="Credit Limit" icon="bi-currency-dollar" amountText="Tsh 30,000" percentNumber="" percentText="Eligible loan amount" />
              <SummaryCard title="Credit Score" icon="bi-shield-check" amountText="0" percentNumber="0%" percentText="Credit Score" />
              <CreditOffers />
            </div>
          </div>
          {/* End Left side columns */}
          {/* Right side columns */}
          {/* <div class="col-lg-4">
            <RecentActivity />
            <NewsCard />
          </div> */}
          {/* End Right side columns */}
        {/* </div>
      </section> */}
    </>
  )
})




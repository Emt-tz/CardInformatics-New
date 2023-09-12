import { component$} from "@builder.io/qwik";

import { CreditOffers } from "~/components/cards/credit_offers";

export default component$(() => {
    //const location = useLocation();
    return (<>
        <div class="pagetitle">
            <h1>Market Place Credit Offers</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                    <li class="breadcrumb-item active">Credit Offers</li>
                </ol>
            </nav>
        </div>
        <CreditOffers />
    </>
    );
});
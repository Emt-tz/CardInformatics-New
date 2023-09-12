import { component$, useStore } from "@builder.io/qwik";

export const CreditOffers = component$(() => {
    const offers = {
      value:[
        {
          id: "",
          institution_type:"",
          credit_type:"",
          credit_product: "",                                                 
          credit_limit:"",
          date:"",
          app_deadline: ""
        }
      ]
    };
    return (
        <>
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Credit Offers
                        </h5>
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Financial Institution Category</th>
                                    <th scope="col">Type of Credit</th>
                                    <th scope="col">Credit Product</th>
                                    <th scope="col">Credit Limit</th>
                                    <th scope="col">Announced</th>
                                    <th scope="col">Deadline</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tbody>
                                    {offers.value.map((offer) => {
                                        const status = new Date(offer.app_deadline) < new Date();
                                        const statusBadgeClass = status ? "badge bg-danger" : "badge bg-success";
                                        return (
                                            <>
                                                <tr key={offer.id} data-bs-toggle="modal" data-bs-target={`#largeModal${offer.id}`}>
                                                    <th scope="row"><a href="#">{offer.id}</a></th>
                                                    <td>{offer.institution_type}</td>
                                                    <td>{offer.credit_type}</td>
                                                    <td>{offer.credit_product}</td>
                                                    <td>{offer.credit_limit}</td>
                                                    <td>{offer.date}</td>
                                                    <td>{offer.app_deadline}</td>
                                                </tr>
                                                {OfferModal(offer)}
                                            </>
                                        );
                                    })}
                                </tbody>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </>
    )
})

export const OfferModal = (offer: any) => (
    <div class="modal fade" id={`largeModal${offer.id}`} tabIndex={-1}>
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header bg-primary text-white">
            <h5 class="modal-title">{offer.credit_product}</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="row">
              <div class="col-md-6">
                <h6 class="mb-3">Basic Information:</h6>
                <p><strong>Date:</strong> {offer.date}</p>
                <p><strong>ID:</strong> {offer.id}</p>
                <p><strong>Promotion Code:</strong> {offer.promotion_code}</p>
                <p><strong>Bank ID:</strong> {offer.bank_id}</p>
                {/* Add more basic properties here as needed */}
              </div>
              <div class="col-md-6">
                <h6 class="mb-3">Additional Information:</h6>
                <p><strong>Bank Admin Email:</strong> {offer.bankAdm_email}</p>
                <p><strong>Bank Admin Phone:</strong> {offer.bankAdm_no}</p>
                <p><strong>Institution Type:</strong> {offer.institution_type}</p>
                <p><strong>Number of Employees:</strong> {offer.number_of_employees}</p>
                {/* Add more additional properties here as needed */}
              </div>
            </div>
            <hr />
            <h6 class="mb-3">Details:</h6>
            <p><strong>Currency:</strong> {offer.currency}</p>
            <p><strong>Credit Limit:</strong> {offer.credit_limit}</p>
            <p><strong>Interest Charge:</strong> {offer.interest_charge}</p>
            {/* Include more relevant details here */}
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
              Close
            </button>
          </div>
        </div>
      </div>
    </div>
  );
  
  
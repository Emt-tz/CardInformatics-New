import { component$ } from "@builder.io/qwik";


export const NewsCard = component$(() => {
    const loadNews = () => {
        const newsItems = [
            {
                title: 'CRDB Bank Joins Card Informatics',
                description: 'Get ready to get loans by inuka loans from CRDB Bank.',
                imageUrl: '/img/favicon.png', // Replace with actual image URL
            },
            {
                title: 'New Loan Products Available Now',
                description: 'Introducing our latest loan products designed to meet your financial needs.',
                imageUrl: '/img/favicon.png', // Replace with actual image URL
            },
            // Add more news items here
        ];

        return (
            <div class="news">
                {newsItems.map((item, index) => (
                    <div key={index} class="post-item clearfix">
                        <img src={item.imageUrl} alt="" width="200" height="40" />
                        <h4><a href="#">{item.title}</a></h4>
                        <p>{item.description}</p>
                    </div>
                ))}
            </div>
        );
    };

    return (
        <div class="card">
             <div class="filter">
                <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <li class="dropdown-header text-start">
                        <h6>Filter</h6>
                    </li>
                    <li><a class="dropdown-item" href="#">Today</a></li>
                    {/* <li><a class="dropdown-item" href="#">This Month</a></li>
                    <li><a class="dropdown-item" href="#">This Year</a></li> */}
                </ul>
            </div>
            <div class="card-body pb-0">
                <h5 class="card-title">News &amp; Updates<span> | Today</span></h5>
                {loadNews()}
            </div>
        </div>
    );
});

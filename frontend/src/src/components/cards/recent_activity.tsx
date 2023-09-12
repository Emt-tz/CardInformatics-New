import { component$ } from "@builder.io/qwik";

interface ActivityItem {
    time: string
    badgeColor: string
    content: string
}

export const ActivityItem = component$((props: ActivityItem) => {
    return (
        <div class="activity-item d-flex">
            <div class="activite-label">{props.time}</div>
            <i class={`bi bi-circle-fill activity-badge ${props.badgeColor} align-self-start`}></i>
            <div class="activity-content">
                {props.content}
            </div>
        </div>
    );
});

export const RecentActivity = component$(() => {
    const activityData = [
        {
            time: '1 hr',
            badgeColor: 'text-primary',
            content: 'Received payment of $150 from John Doe',
        },
        {
            time: '3 hrs',
            badgeColor: 'text-info',
            content: 'Reviewed new loan application for Sarah Johnson',
        },
        {
            time: '1 day',
            badgeColor: 'text-warning',
            content: 'Upgraded system infrastructure to improve performance',
        },
        {
            time: '2 days',
            badgeColor: 'text-danger',
            content: 'Important meeting scheduled with the board members',
        },
        {
            time: '1 week',
            badgeColor: 'text-muted',
            content: 'Completed training session on new software tools',
        },
    ];

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
            <div class="card-body">
                <h5 class="card-title">Recent Activity <span>| Today</span></h5>
                <div class="activity">
                    {activityData.map(item => (
                        <ActivityItem // Ensure each activity has a unique key
                            time={item.time}
                            badgeColor={item.badgeColor}
                            content={item.content}
                        />
                    ))}
                </div>
            </div>
        </div>
    );
});

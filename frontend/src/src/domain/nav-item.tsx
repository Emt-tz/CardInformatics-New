export interface NavItem  {
    title: string,
    leadingIcon: string,
    children?: Array<NavItemChild>,
    url?: string
}

export interface  NavItemChild  {
    title: string,
    url: string,
}
import {usePage} from "@inertiajs/vue3";

export const progress = {
    delay: 250,
    color: '#ec1010',
    includeCSS: true,
    showSpinner: true,
}

export function appData(data) {
    const page = usePage()
    return page.props.app[data]
}

export function appRoute(route_name, params = null) {
    return route('app.' + route_name, params)
}

export function currentAppRouteIs(routeName) {
    return route().current('app.' + routeName)
}

export function asset(path) {
    const page = usePage()
    return page.props.asset  + path
}

export function isEmpty(data) {
    return Object.entries(data).length !== 0
}

export function authData () {
    const page = usePage()
    return page.props.auth
}

export function isAuthenticated (guard = "admin") {
    const page = usePage()
    return page.props.auth !== null && page.props.auth.hasOwnProperty(guard)
}

export function authUser (guard = "admin") {
    const page = usePage()
    return page.props.auth[guard]
}

export function userHasPermission (permission) {
    const page = usePage()
    return page.props.auth["admin"].permissions.includes(permission)
}

export function userHasPermissions (permission) {
    const page = usePage()

    if (permission !== undefined && permission !== null) {
        for (const key of permission) {
            if (page.props.auth["admin"].permissions.includes(key)) {
                return true
            }
        }
    }

    return false
}

export function userHasRole (role) {
    const page = usePage()
    return page.props.auth["admin"].roles.includes(role)
}

export function currentLocale (data) {
    const page = usePage()
    return page.props.locales.current[data]
}

export function supportedLocales () {
    const page = usePage()
    return page.props.locales.supported
}

export function resolveIsoCode (code) {
    return code ==='en' ? 'gb' : code;
}

export function authUserIsInAgency (guard = "admin") {
    const page = usePage()
    return page.props.auth[guard].hasOwnProperty("agency")
}

export function authUserIsInAgencyAndHavePermission(permission) {
    return authUserIsInAgency("admin") && userHasPermission(permission)
}

import React from "react";
import {
    HomeIcon,
    UserCircleIcon,
    Cog6ToothIcon,
} from "@heroicons/react/24/outline";

const navItems = [
    { to: "/", label: "Home", icon: HomeIcon },
    { to: "/profile", label: "Profile", icon: UserCircleIcon },
    { to: "/settings", label: "Settings", icon: Cog6ToothIcon },
];

export default navItems;

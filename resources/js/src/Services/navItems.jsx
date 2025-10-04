import React from "react";
import {
    HomeIcon,
    UserCircleIcon,
    Cog6ToothIcon,
} from "@heroicons/react/24/outline";

const navItems = [
    { to: "/", label: "ALL", icon: HomeIcon },
    { to: "/match-lineup", label: "Match Lineup", icon: UserCircleIcon },
    { to: "/matches", label: "Matches", icon: Cog6ToothIcon },
];

export default navItems;

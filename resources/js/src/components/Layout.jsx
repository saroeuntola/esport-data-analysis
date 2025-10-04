import React, { useState } from "react";
import { Bars3Icon } from "@heroicons/react/24/outline";
import { NavLink } from "react-router-dom";
import navItems from "../Services/navItems";
import Home from "./Home";

const Layout = () => {
    const [openSidebar, setOpenSidebar] = useState(false); 

    return (
        <div className="flex h-screen bg-gray-100">
            {/* Sidebar */}
            <aside
                className={`
          bg-white shadow-md flex flex-col
          fixed top-0 left-0 h-full z-50 w-full
          transform transition-transform duration-300
          ${openSidebar ? "translate-x-0" : "-translate-x-full"} 
          w-64
          md:relative md:translate-x-0 md:w-64
        `}
            >
                <div className="flex items-center justify-between p-4 border-b">
                    <h2 className="text-lg font-semibold text-gray-700">
                        My App
                    </h2>
                    <button
                        onClick={() => setOpenSidebar(false)}
                        className="p-2 rounded hover:bg-gray-100 md:hidden"
                    >
                        ✕ 
                    </button>
                </div>

                {/* Navigation */}
                <nav className="flex-1 p-4 space-y-2">
                    {navItems.map((item, i) => {
                        const Icon = item.icon;
                        return (
                            <NavLink
                                key={i}
                                to={item.to}
                                end
                                className={({ isActive }) =>
                                    `flex items-center gap-3 px-3 py-2 rounded-lg transition ${
                                        isActive
                                            ? "bg-blue-100 text-blue-600 font-medium"
                                            : "text-gray-700 hover:bg-gray-50"
                                    }`
                                }
                                onClick={() => setOpenSidebar(false)} 
                            >
                                <Icon className="h-5 w-5" />
                                <span>{item.label}</span>
                            </NavLink>
                        );
                    })}
                </nav>
            </aside>

            {/* Main Content */}
            <div className="flex-1 flex flex-col">
                {/* Navbar */}
                <header className="h-16 bg-white shadow-md flex items-center justify-between px-6">
                    <button
                        onClick={() => setOpenSidebar(true)}
                        className="p-2 rounded hover:bg-gray-100 md:hidden"
                    >
                        <Bars3Icon className="h-5 w-5 text-gray-700" />
                    </button>
                    <h1 className="text-lg font-semibold text-gray-700">
                        Site Name
                    </h1>
                </header>

                {/* Page Content */}
                <main className="flex-1 p-6 overflow-y-auto">
                    <div className="bg-white shadow rounded-lg p-6">
                        <Home />
                    </div>
                </main>
            </div>

            {/* Overlay for mobile when sidebar is open */}
            {openSidebar && (
                <div
                    className="fixed inset-0 bg-black bg-opacity-25 z-40 md:hidden"
                    onClick={() => setOpenSidebar(false)}
                ></div>
            )}
        </div>
    );
};

export default Layout;

import { BrowserRouter as Router, Routes, Route } from "react-router-dom";
import Login from "./components/Login";
import Dashboard from "./components/Dashboard";

function AppRoutes() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />}></Route>
        <Route path="/dashboard" element={<Dashboard />}></Route>
      </Routes>
    </Router>
  );
}

export default AppRoutes;

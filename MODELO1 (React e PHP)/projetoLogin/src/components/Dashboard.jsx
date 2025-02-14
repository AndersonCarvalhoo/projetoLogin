import { Link } from "react-router-dom";

export default function Dashboard() {
  return (
    <>
      <header>
        <nav className="navbar bg-body-tertiary">
          <div className="container-fluid">
            <a className="navbar-brand" href="#">
              <img
                src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo.svg"
                alt="Logo"
                width="30"
                height="24"
              />
              Painel do sistema de LOGIN
            </a>
          </div>
        </nav>
      </header>
      <div className="container">
        <h2>Bem vindo</h2>
        <form action="logout.php">
          <Link to="/">
            <button type="submit" className="btn btn-danger">
              Logout
            </button>
          </Link>
        </form>
      </div>
    </>
  );
}

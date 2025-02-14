import { useState } from "react";
import { useNavigate } from "react-router-dom";

const Login = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");
  const [remember, setRemember] = useState(false);
  const navigate = useNavigate();

  const handleSubmit = async (e) => {
    e.preventDefault();
    setError("");

    const response = await fetch("http://localhost/loginbackend/login.php", {
      method: "POST",
      credentials: "include",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify({ email, password, remember }),
    });

    const data = await response.json();
    if (data.success) {
      navigate("/dashboard");
    } else {
      setError(data.message);
    }
  };

  return (
    <div className="d-flex justify-content-center align-items-center vh-100">
      <div className="container">
        <div className="row justify-content-center">
          <div className="col-md-4">
            <h3 className="text-center">Login</h3>
            <form onSubmit={handleSubmit}>
              <div className="mb-3">
                <label htmlFor="email" className="form-label">
                  E-mail:
                </label>
                <input
                  type="email"
                  className="form-control"
                  id="email"
                  value={email}
                  onChange={(e) => setEmail(e.target.value)}
                  required
                />
              </div>
              <div className="mb-3">
                <label htmlFor="password" className="form-label">
                  Senha:
                </label>
                <input
                  type="password"
                  className="form-control"
                  id="password"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  required
                />
              </div>
              {error && <div className="text-danger mb-3">{error}</div>}
              <div className="mb-3 form-check">
                <input
                  type="checkbox"
                  className="form-check-input"
                  id="lembrar"
                  checked={remember}
                  onChange={(e) => setRemember(e.target.checked)}
                />
                <label className="form-check-label" htmlFor="lembrar">
                  Manter logado
                </label>
              </div>
              <button type="submit" className="btn btn-primary w-100">
                Entrar
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Login;

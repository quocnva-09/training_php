<?php

namespace Frameworks;

class Router
{
  private array $routes = [];

  // Sử dụng để thêm các path và param và router
  public function add(string $path, array $params = []): void
  {
    $this->routes[] = [
      "path" => $path,
      "params" => $params
    ];
  }

  // Sử dụng để điều hướng request đến đúng Controller
  public function dispatch(string $path, string $method): void
  {
    $params = $this->match($path, $method);

    if ($params) {
      $controllerName = ucfirst($params["controller"]) . "Controller";
      $namespace = "App\Controllers\\";
      if (array_key_exists("namespace", $params)) {
        $namespace .= $params["namespace"] . "\\";
      }

      $controllerClass = $namespace . $controllerName;

      if (class_exists($controllerClass)) {
        $controller_object = new $controllerClass($params);

        $action = $params["action"];

        if (is_callable([$controller_object, $action])) {
          $controller_object->$action();
        } else {
          echo "Lỗi: Phương thức '$action' không tồn tại trong class '$controllerClass'";
        }
      } else {
        echo "Lỗi: Class Controller '$controllerClass' không tồn tại.";
      }
    } else {
      echo "Lỗi 404: Không tìm thấy đường dẫn (Route not found).";
    }
  }

  // Sử dụng để tìm kiếm route phù hợp với request
  public function match(string $path, string $method): array|bool
  {
    $path = urldecode($path);

    $path = trim($path, "/");

    foreach ($this->routes as $route) {

      $pattern = $this->getPatternFromRoutePath($route["path"]);

      if (preg_match($pattern, $path, $matches)) {

        $matches = array_filter($matches, "is_string", ARRAY_FILTER_USE_KEY);

        $params = array_merge($matches, $route["params"]);

        if (array_key_exists("method", $params)) {

          if (strtolower($method) !== strtolower($params["method"])) {

            continue;

          }

        }

        return $params;
      }
    }

    return false;
  }

  // Sử dụng để chuyển đổi route path thành pattern regex
  private function getPatternFromRoutePath(string $route_path): string
  {
    $route_path = trim($route_path, "/");

    $segments = explode("/", $route_path);

    $segments = array_map(function (string $segment): string {

      if (preg_match("#^\{([a-z][a-z0-9]*)\}$#", $segment, $matches)) {

        return "(?<" . $matches[1] . ">[^/]*)";

      }

      if (preg_match("#^\{([a-z][a-z0-9]*):(.+)\}$#", $segment, $matches)) {

        return "(?<" . $matches[1] . ">" . $matches[2] . ")";

      }

      return $segment;

    }, $segments);

    return "#^" . implode("/", $segments) . "$#iu";
  }
}

?>
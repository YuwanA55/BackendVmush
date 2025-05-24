apiVersion: networking.k8s.io/v1
kind: Ingress
metadata:
  name: laravel-ingress
  annotations:
    kubernetes.io/ingress.class: "nginx"
    nginx.ingress.kubernetes.io/rewrite-target: /
    nginx.ingress.kubernetes.io/ssl-redirect: "true"  # Redirect HTTP ke HTTPS
spec:
  rules:
  - host: vmush.site
    http:
      paths:
      - path: /
        pathType: Prefix
        backend:
          service:
            name: laravel-service
            port:
              number: 80
  tls:  # Bagian untuk konfigurasi HTTPS
  - hosts:
    - vmush.site
    secretName: tls-secret  # Gantilah 'tls-secret' dengan nama secret yang berisi sertifikat SSL kamu

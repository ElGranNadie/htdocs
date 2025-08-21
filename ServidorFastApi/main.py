from fastapi import FastAPI, HTTPException, Depends
from pydantic import BaseModel
import mysql.connector
from fastapi.middleware.cors import CORSMiddleware

# Configuración de la base de datos con los datos de la primera imagen
db_config = {
    'user': '3Gw9xU5nZKmW4hv.root',
    'password': 'Dv92surgRHtse239',  # <-- aquí pon tu contraseña real
    'host': 'gateway01us-east-1.prod.aws.tidbcloud.com',
    'port': 4000,
    'database': 'test'
}

app = FastAPI()

# Configuración de CORS (por si accedes desde frontend)
app.add_middleware(
    CORSMiddleware,
    allow_origins=["*"],  # Cambia "*" por los dominios permitidos en producción
    allow_credentials=True,
    allow_methods=["*"],
    allow_headers=["*"],
)

# Ejemplo de endpoint para probar conexión
@app.get("/ping")
def ping_db():
    try:
        conn = mysql.connector.connect(**db_config)
        cursor = conn.cursor()
        cursor.execute("SELECT NOW();")
        result = cursor.fetchone()
        conn.close()
        return {"status": "success", "server_time": result[0]}
    except Exception as e:
        raise HTTPException(status_code=500, detail=str(e))

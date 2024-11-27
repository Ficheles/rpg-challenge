#!/bin/bash


BASE_URL="http://localhost:8000/api/v1"
HEADER_ACCEPT_JSON="Accept: application/json"
HEADER_CONTENT_TYPE_JSON="Content-Type: application/json"


function test_get {
  echo "GET $1"
  curl -X GET "${BASE_URL}$1" -H "${HEADER_ACCEPT_JSON}"
  echo -e "\n"
}


function test_post {
  echo "POST $1"
  curl -X POST "${BASE_URL}$1" -H "${HEADER_ACCEPT_JSON}" -H "${HEADER_CONTENT_TYPE_JSON}" -d "$2"
  echo -e "\n"
}


function test_put {
  echo "PUT $1"
  curl -X PUT "${BASE_URL}$1" -H "${HEADER_ACCEPT_JSON}" -H "${HEADER_CONTENT_TYPE_JSON}" -d "$2"
  echo -e "\n"
}


function test_delete {
  echo "DELETE $1"
  curl -X DELETE "${BASE_URL}$1" -H "${HEADER_ACCEPT_JSON}"
  echo -e "\n"
}

# Testando endpoints de Players
test_get "/classes"
test_post "/classes" '{"name": "Novo Jogador"}'
test_get "/classes/5"
test_put "/classes/5" '{"name": "Jogador Atualizado"}'
test_delete "/classes/5"

test_get "/players"
test_post "/players" '{"name": "Novo Jogador", "class_id": 1, "xp": 50, "confirmed": true}'
test_get "/players/1"
test_put "/players/1" '{"name": "Jogador Atualizado", "class_id": 2, "xp": 70, "confirmed": true}'
test_delete "/players/1"

# Testando endpoints de Guilds
test_post "/form-guilds" '{"number_of_guilds": 3}'

echo "Testes concluídos."
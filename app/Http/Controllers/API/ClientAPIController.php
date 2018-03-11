<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientAPIRequest;
use App\Http\Requests\API\UpdateClientAPIRequest;
use App\Models\Client;
use App\Repositories\ClientRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class ClientController
 * @package App\Http\Controllers\API
 */

class ClientAPIController extends AppBaseController
{
    /** @var  ClientRepository */
    private $clientRepository;

    public function __construct(ClientRepository $clientRepo)
    {
        $this->clientRepository = $clientRepo;
    }

    /**
     * Display a listing of the Client.
     * GET|HEAD /clients
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->clientRepository->pushCriteria(new RequestCriteria($request));
        $this->clientRepository->pushCriteria(new LimitOffsetCriteria($request));
        $clients = $this->clientRepository->all();

        return $this->sendResponse($clients->toArray(), 'Clients retrieved successfully');
    }

    /**
     * Store a newly created Client in storage.
     * POST /clients
     *
     * @param CreateClientAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientAPIRequest $request)
    {
        $input = $request->all();

        $clients = $this->clientRepository->create($input);

        return $this->sendResponse($clients->toArray(), 'Client saved successfully');
    }

    /**
     * Display the specified Client.
     * GET|HEAD /clients/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Client $client */
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        return $this->sendResponse($client->toArray(), 'Client retrieved successfully');
    }

    /**
     * Update the specified Client in storage.
     * PUT/PATCH /clients/{id}
     *
     * @param  int $id
     * @param UpdateClientAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientAPIRequest $request)
    {
        $input = $request->all();

        /** @var Client $client */
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        $client = $this->clientRepository->update($input, $id);

        return $this->sendResponse($client->toArray(), 'Client updated successfully');
    }

    /**
     * Remove the specified Client from storage.
     * DELETE /clients/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Client $client */
        $client = $this->clientRepository->findWithoutFail($id);

        if (empty($client)) {
            return $this->sendError('Client not found');
        }

        $client->delete();

        return $this->sendResponse($id, 'Client deleted successfully');
    }
}

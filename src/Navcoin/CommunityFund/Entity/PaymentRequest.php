<?php

namespace App\Navcoin\CommunityFund\Entity;

class PaymentRequest
{
    /**
     * @var int
     */
    private $version;

    /**
     * @var string
     */
    private $hash;

    /**
     * @var string
     */
    private $blockHash;

    /**
     * @var string
     */
    private $proposalHash;

    /**
     * @var string
     */
    private $description;

    /**
     * @var float
     */
    private $requestedAmount;

    /**
     * @var int
     */
    private $votesYes;

    /**
     * @var int
     */
    private $votesNo;

    /**
     * @var int
     */
    private $votingCycle;

    /**
     * @var string
     */
    private $state;

    /**
     * @var string
     */
    private $stateChangedOnBlock;

    /**
     * @var string
     */
    private $status;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var string
     */
    private $paidOnBlock;

    public function __construct(
        int $version,
        string $hash,
        string $blockHash,
        string $proposalHash,
        string $description,
        float $requestedAmount,
        int $votesYes,
        int $votesNo,
        int $votingCycle,
        string $state,
        ?string $stateChangedOnBlock,
        string $status,
        \DateTime $createdAt
    ) {
        $this->version = $version;
        $this->hash = $hash;
        $this->blockHash = $blockHash;
        $this->proposalHash = $proposalHash;
        $this->description = $description;
        $this->requestedAmount = $requestedAmount;
        $this->votesYes = $votesYes;
        $this->votesNo = $votesNo;
        $this->votingCycle = $votingCycle;
        $this->state = $state;
        $this->stateChangedOnBlock = $stateChangedOnBlock;
        $this->status = $status;
        $this->createdAt = $createdAt;
    }

    public function getVersion(): int
    {
        return $this->version;
    }

    public function getHash(): string
    {
        return $this->hash;
    }

    public function getBlockHash(): string
    {
        return $this->blockHash;
    }

    public function getProposalHash(): string
    {
        return $this->proposalHash;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function getRequestedAmount(): float
    {
        return $this->requestedAmount;
    }

    public function getVotesYes(): int
    {
        return $this->votesYes;
    }

    public function getVotesNo(): int
    {
        return $this->votesNo;
    }

    public function getVotesTotal(): int
    {
        return $this->votesYes + $this->votesNo;
    }

    public function getVotingCycle(): int
    {
        return $this->votingCycle;
    }

    public function getState(): string
    {
        return $this->state;
    }

    public function getStateChangedOnBlock(): string
    {
        return $this->stateChangedOnBlock;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function getCreatedAt(): \DateTime
    {
        return $this->createdAt;
    }

    public function getPaidOnBlock(): ?string
    {
        if ($this->paidOnBlock == "0000000000000000000000000000000000000000000000000000000000000000") {
            return null;
        }

        return $this->paidOnBlock;
    }

    public function setPaidOnBlock(string $paidOnBlock): self
    {
        $this->paidOnBlock = $paidOnBlock;

        return $this;
    }
}
